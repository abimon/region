@extends('layouts.auth',['title' => 'Certificate'])
@section('content')
<?php $names = [
    'Abobo Ombati Edimon',
    'Sarah Kemunto'
]; ?>

@foreach ($names as $name)
<div class="mb-2" style="height: 100vh; width: 100%;display:inline-block;">
    <p style="font-size: 2rem; font-weight: bold; text-align:center;z-index:2;position:relative;top:35%;">{{ $name}}</p>
    <img src="/storage/images/cert.png" alt="" style="width: 100vw;height:90vh;object-fit:contain;">
</div>

@endforeach
@endsection