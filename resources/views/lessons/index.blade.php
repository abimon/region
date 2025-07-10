@extends('layouts.app', ['title' => 'Lessons'])
@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Lessons</h3>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary">Create Lesson</a>
    </div>
    @foreach ($lessons as $lesson)
    <div class="mb-3 card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $lesson->image }}" alt="" style="width:80%; object-fit:cover;">
                </div>
                <div class="col-md-8 mt-3">
                    <h5 class="card-title">
                        <a href="{{ route('lessons.show', $lesson->id) }}" style="text-decoration: none;color:black;">{{ $lesson->title }}</a>
                    </h5>
                    <div style="height:20px; overflow:hidden;" class='mb-3'><?php echo html_entity_decode($lesson->content); ?></div>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted fw-bold"><i class="fa fa-user"></i> <i>{{ $lesson->instructor }}</i></p>
                        <p class="text-muted fw-bold"><i class="fa fa-clock"></i> {{ $lesson->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection