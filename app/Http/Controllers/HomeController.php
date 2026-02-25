<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assigment;
use App\Models\ChurchClass;
use App\Models\ClassMember;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }
    public function dashboard($role){
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
        $class_id=request('class_id')??$classes->first();
        // fetch lessons upcoming for three different dates and the assignments for the class
        $lessons = Lesson::whereIn('class_id', $classes)->where('date', '>=', date('Y-m-d'))->take(4)->get();
        $assignments = Assigment::whereIn('class_id', $classes)->where('due_by', '>=', date('Y-m-d'))->get();
        $announcements = Announcement::whereIn('class_id', $classes)->where('due_by', '>=', date('Y-m-d'))->get();
        if(request()->is('api/*')){
            return response()->json(['status'=>true,'message' => 'Welcome to the dashboard', 'lessons' => $lessons, 'assignments' => $assignments, 'announcements' => $announcements,'classes'=>ChurchClass::whereIn('id', $classes)->get()], 200);
        }
        return view("dashboard", compact('lessons', 'assignments', 'announcements'));
    }


}
