<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assigment;
use App\Models\ClassMember;
use App\Models\Lesson;
use Carbon\Carbon;
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


}
