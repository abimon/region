@extends('layouts.app', ['title' => $article->title])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            <img src="{{ $article->image }}" style="height:100%;object-fit:cover;width:100%;" alt="">
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-10">
                    <h3 class="fw-bold text-center">{{ $article->title }}</h3>
                </div>
                <div class="col-1 text-end">
                    <a href="{{ route('articles.edit', $article->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
            </div>
            <div><?php echo html_entity_decode($article->content); ?></div>
        </div>
    </div>
</div>
@endsection