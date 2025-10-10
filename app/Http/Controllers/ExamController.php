<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Exam::with('student')->get();
        $students = User::whereNotIn('id', function ($query) {
            $query->select('user_id')->from('exams');
        })->get();
        // dd($users);
        return view('exams.index', compact('results', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('exams.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // dd(request());
        try {
            $user = User::findOrFail(request('student_id'));
            $exam = Exam::create([
                'user_id' => $user->id,
                'church_heritage' => request('ch'),
                'bible_truth' => request('bt'),
                'general_knowledge' => request('gk'),
                'logged_by' => Auth::user()->id
            ]);
            $this->sendEmail($user, $exam, 'University Region ' . date('Y') . ' Exam Results');
            return redirect()->route('exams.index')->with('success', 'Results recorded successifully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to record the marks. ' . $th->getMessage())->withInput();
        }
    }
    public function sendEmail($user, $content, $subject)
    {
        Mail::send(
            'mail',
            ['user' => $user, 'content' => $content],
            function ($message) use ($user, $subject) {
                $message->to($user->email, $user->name)->subject($subject);
            }
        );
    }
    public function sendUserEmail($id)
    {
        $exam = Exam::findOrFail($id);
        $user = User::findOrFail($exam->user_id);
        $this->sendEmail($user, $exam, 'University Region ' . date('Y') . ' Exam Results');
        return back()->with('success', 'Email sent successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
