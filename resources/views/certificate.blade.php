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
<img src="/storage/images/" alt="">
@endforeach

@endsection