@extends('layouts.app', ['title' => 'Articles'])
@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Articles</h3>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
    </div>
    @foreach ($articles as $article)
    <div class="mb-3 card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $article->image }}" alt="" style="width:80%; object-fit:cover;">
                </div>
                <div class="col-md-8 mt-3">
                    <h5 class="card-title">
                        <a href="{{ route('articles.show', $article->id) }}" style="text-decoration: none;color:black;">{{ $article->title }}</a>
                    </h5>
                    <div style="height:20px; overflow:hidden;" class='mb-3'><?php echo html_entity_decode($article->content); ?></div>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted fw-bold"><i class="fa fa-user"></i> <i>{{ $article->author->name }}</i></p>
                        <p class="text-muted fw-bold"><i class="fa fa-clock"></i> {{ $article->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection