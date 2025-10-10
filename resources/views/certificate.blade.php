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
<div class="mb-2" style="height: 100vh; width: 100%;display:inline-block;page-break-after:always;">
    <p style="font-size: 2rem; font-weight: bold; text-align:center;z-index:2;position:relative;top:35%;">{{ $name}}</p>
    <img src="/storage/images/cert.jpg" alt="" style="width: 100vw;height:90vh;object-fit:contain;">
</div>

@endforeach
@endsection