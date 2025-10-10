@extends('layouts.app', ['title' => 'Exams'])

@section('content')
<div class="container-fluid">
    <div class="mb-3 row">
        <div class="col-md-6 p-4">
            <a href="{{ route('exams.create') }}">
                <button class="btn btn-info w-100">Record Marks</button>
            </a>
        </div>
        <div class="col-md-6 p-4">
            <button class="btn btn-outline-success" data-bs-target="#addResultsModal" data-bs-toggle="modal" id="addChurchBtn">+ Result</button>
        </div>
    </div>
    <!-- Add results modal button and modal -->
    <div class="modal fade" id="addResultsModal" tabindex="-1" aria-labelledby="addResultsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addResultsModalLabel">Add Results</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('exams.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student</label>
                            <select class="form-select" name="student_id" id="student_id" required>
                                <option value="">Select Student</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="church_heritage" class="form-label">Church Heritage</label>
                            <input type="number" class="form-control" name="ch" id="church_heritage" required>
                        </div>
                        <div class="mb-3">
                            <label for="bible_truth" class="form-label">Bible Truth</label>
                            <input type="number" class="form-control" name="bt" id="bible_truth" required>
                        </div>
                        <div class="mb-3">
                            <label for="general_knowledge" class="form-label">General Knowledge</label>
                            <input type="number" class="form-control" name="gk" id="general_knowledge" required>
                        </div>
                        <button type="submit" class="btn btn-success">Submit Result</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Institution</th>
            <th>Year Of Exam</th>
            <th>Church Heritage</th>
            <th>Bible Truth</th>
            <th>General Knowledge</th>
            <th>Average</th>
            <th>Comment</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-uppercase">{{ $result->student->name }}</td>
                <td>{{ $result->student->institution }}</td>
                <td>{{ date_format($result->created_at,'Y') }}</td>
                <td>{{ $result->church_heritage }}</td>
                <td>{{ $result->bible_truth }}</td>
                <td>{{ $result->general_knowledge }}</td>
                <?php $average = ceil(($result->church_heritage + $result->bible_truth + $result->general_knowledge) / 3);?>
                <td>{{ $average }}</td>
                <td>{{ $average<60?'Pass':'Fail' }}</td>
                <td>
                    <a href="/sendUserEmail/{{ $result->id }}"><button class="btn btn-warning">Send Result</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection