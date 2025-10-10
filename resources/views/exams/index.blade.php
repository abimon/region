@extends('layouts.app', ['title' => 'Exams'])

@section('content')
<div class="container-fluid">
    <div class="m-5"><a href="{{ route('exams.create') }}"><button class="btn btn-info w-100">Record Marks</button></a></div>
    <table class="table table-responsive">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Institution</th>
            <th>Year Of Exam</th>
            <th>Church Heritage</th>
            <th>Bible Truth</th>
            <th>General Knowledge</th>
            <th>Comment</th>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-uppercase">{{ $member->student->name }}</td>
                <td>{{ $member->student->institution }}</td>
                <td>{{ date_format($member->created_at,'Y') }}</td>
                <td>{{ $member->church_heritage }}</td>
                <td>{{ $member->bible_truth }}</td>
                <td>{{ $member->general_knowledge }}</td>
                <td>
                    <a href="/sendUserEmail"><button class="btn btn-warning">Send Result</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection