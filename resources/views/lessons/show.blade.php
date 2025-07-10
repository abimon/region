@extends('layouts.app', ['title' => $lesson->title])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            <img src="{{ $lesson->image }}" style="height:100%;object-fit:cover;width:100%;" alt="">
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-10">
                    <h3 class="fw-bold text-center">{{ $lesson->title }}</h3>
                </div>
                <div class="col-1 text-end">
                    <a href="{{ route('lessons.edit', $lesson->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
            </div>
            <div><?php echo html_entity_decode($lesson->content); ?></div>
        </div>
    </div>
</div>
@endsection