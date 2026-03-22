<?php

namespace App\Http\Controllers;

use App\Models\ClassMember;
use App\Models\Lesson;
use App\Models\LessonResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Lesson::create([
                'class_id'=>request('class_id'),
                'title'=>request('title'),
                'description'=>request('description'),
                'instructor'=>request('instructor'),
                'date'=>request('date'),
                'venue'=>request('venue'),
                'venue_type'=>request('venue_type'),
                'comments'=>request('comments')??null,
                'created_by'=>Auth::id()
            ]);
            if(request()->is('api/*')){
                return response()->json(['message'=>'Lesson created successfully'],201);
            }
            return back()->with('success','Lesson created successfully');
        } catch (\Throwable $th) {
           if(request()->is('api/*')){
                return response()->json(['message'=>'Something went wrong'],400);
            }
            return back()->with('error','Something went wrong. '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($class_id)
    {
        $lessons = Lesson::orderBy('date','asc')->where('class_id',$class_id)->get();
        if(request()->is('api/*')){
            return response()->json(['lessons'=>$lessons]);
        }
        return view('lessons.index',compact('lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $lesson=Lesson::findOrFail($id);
        if(request('title')!=null){
            $lesson->title=request('title');
        }
        if(request('description')!=null){
            $lesson->description=request('description');
        }
        if(request('instructor')!=null){
            $lesson->instructor=request('instructor');
        }
        if(request('date')!=null){
            $lesson->date=request('date');
        }
        if(request('venue')!=null){
            $lesson->venue=request('venue');
        }
        if(request('venue_type')!=null){
            $lesson->venue_type=request('venue_type');
        }
        if(request('content')!=null){
            $lesson->content=request('content');
        }
        if(request('status')!=null){
            $lesson->status=request('status');
        }
        if(request('content_type')!=null){
            $lesson->content_type=request('content_type');
        }
        if(request('comments')!=null){
            $lesson->comments=request('comments');
        }
        if(request('created_by')!=null){
            $lesson->created_by=request('created_by');
        }
        $lesson->update();
        if(request()->is('api/*')){
            return response()->json(['message'=>'Lesson updated successfully'],200);
        }
        return back()->with('success','Lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    public function getData($lesson_id){
        // lesson, attendees, resources
        $resources = LessonResource::where('lesson_id',$lesson_id)->select('lesson_resources.title', 'lesson_resources.path')->get();
        $attendance = ClassMember::where('church_class_id', Lesson::findOrFail($lesson_id)->class_id)->withExists(['attendances as is_present' => function ($query) {
            $query->whereDate('created_at', Carbon::today());
        }])->join('users', 'users.id', '=', 'class_members.user_id')->select('users.name','users.avatar','class_members.user_id','is_present')->orderBy('name', 'asc')->get();
        if(request()->is('api/*')){
            return response()->json(['attendance'=>$attendance]);
        }
        return view('lessons.show',compact('attendance'));
    }
    public function sendEmail($user, $email, $content, $subject)
    {
        Mail::send(
            'message',
            ['user' => $user, 'content' => $content],
            function ($message) use ($user, $email, $subject) {
                $message->to($email, $user)->subject($subject);
            }
        );
    }

}
