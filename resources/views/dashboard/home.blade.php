@extends('dashboard')
@section('content')
@php
    $email = session('user')->email;
    session()->put($email,$count);
@endphp

<div style="background-color: #d90039;height:100vh;padding-top:110px" >
<div class="container">
    <div class="row pt-5 mb-auto">
        <div class="col-12 col-lg-6">
            <img src="{{ URL::to('/mydata/offer1.jpg') }}" style="width:100%">
        </div>
        <div class="col-12 col-lg-6">
            <img src="{{ URL::to('/mydata/offer2.jpg') }}" style="width:100%">
        </div>
</div>
</div>
</div>
@stop