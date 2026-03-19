<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assigment;
use App\Models\ClassMember;
use App\Models\Contact;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }
    public function dashboard(){
        return view("dashboard");
    }
    public function dashboardRole($role){
        if($role=='student'){
            $role = ['Member'];
        }elseif($role=='teacher'){
            $role = ['Instructor','Assessor','Director','Ass. Director','Elder'];
        }else{
            $role = ['Parent'];
        }
        $classes = ClassMember::where('user_id', Auth::id())->whereIn('role', $role)->pluck('id');
        if($classes->isEmpty()){
            if(request()->is('api/*')){
                return response()->json(['status'=>false,'message' => 'You are not enrolled in any class', 'lessons' => [], 'assignments' => [], 'announcements' => []], 200);
            }
            return view("dashboard", ['lessons' => [], 'assignments' => [], 'announcements' => []]);
        }
        $lessons = Lesson::whereIn('class_id', $classes)->where('date','<=',Carbon::now())->orderBy('created_at', 'desc')->get();
        $assignments = Assigment::whereIn('class_id', $classes)->where('due_by', '<=', Carbon::now())->orderBy('created_at', 'desc')->get();
        $announcements = Announcement::whereIn('class_id', $classes)->where('due_by', '<=', Carbon::now())->orderBy('created_at', 'desc')->get();
        if(request()->is('api/*')){
            return response()->json([
                'status'=>true,
                'message' => 'Welcome to the dashboard', 
                'lessons' => $lessons, 
                'assignments' => $assignments, 
                'announcements' => $announcements
                ], 200);
        }
        return view("dashboard", compact('lessons', 'assignments', 'announcements'));
    }
    public function contact(){
        // store the message and send an sms
        Contact::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'subject'=>request('subject'),
            'phone' => request('phone')??null,
            'message'=>request('message'),
            'is_read'=>false,
            'contact_mode'=>request('contact_mode'),
        ]);
        $this->sendEmail('Admin','eabimon@gmail.com', 'You have a new message from '.request('name'), request('subject'));
        // $this->sendSMS('0788808808', 'You have a new message from '.request('name'));
        
        return back()->with('success', 'Your message has been sent successfully');
    }
    public function sendEmail($user,$email, $content, $subject)
    {
        Mail::send(
            'message',
            ['user' => $user, 'content' => $content],
            function ($message) use ($user, $email,$subject) {
                $message->to($email, $user)->subject($subject);
            }
        );
    }
    public function sendSMS($phone, $message)
    {
        $api_key = env('MOBITECH_API_KEY');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.mobitechtechnologies.com/sms/sendsms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(array(
                "mobile" => $phone,
                "sender_name" => "FULL_CIRCLE",
                "service_id" => 0,
                "message" => $message
            )),
            CURLOPT_HTTPHEADER => array(
                'h_api_key: ' . $api_key,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        // curl_close($curl);
        $res = json_decode($response);
        return $res->status_code;
    }
}
