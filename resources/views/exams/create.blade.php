@extends('layouts.app', ['title' => 'Record Marks'])

@section('content')
<div class="container-fluid">
    <h2 class="mb-3 mt-3">University Region {{ date('Y') }} Exam Score</h2>
    <form action="{{ route('exams.store') }}" method="post">
        @csrf
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Church Heritage</th>
                <th>Bible Truth</th>
                <th>General Knowledge</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-uppercase">{{ $user->name }}</td>
                    <td>
                        <div class="form-floating m-3">
                            <input type="ch{{$user->id}}" placeholder=" " class="form-control">
                            <label for="">Church Heritage</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-floating m-3">
                            <input type="bt{{$user->id}}" placeholder=" " class="form-control">
                            <label for="">Bible Truth</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-floating m-3">
                            <input type="gk{{$user->id}}" placeholder=" " class="form-control">
                            <label for="">General Knowledge</label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit Marks</button>
        </div>
    </form>
</div>
@endsection