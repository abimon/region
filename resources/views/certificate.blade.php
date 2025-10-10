@extends('layouts.auth',['title' => 'Certificate'])
@section('content')
<?php $names = [
    'Edimon Ombati',
    'Edwin Omondi',
    'Erick Omondi',
    'Erick Omondi',
    'Erick Omondi',
    'Erick Omondi',
]; ?>

@foreach ($names as $name)
<img src="data:image/png;base64,{{ base64_encode(file_get_contents( "https://masterguide.apektechinc.com/storage/images/cert.jpg" )) }}">
<!-- <img src="" alt=""> -->
@endforeach
@endsection