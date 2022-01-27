@extends('dashboard')
@section('content')
<div class="container">
    <div class="">
        <h1>Checkout</h1>
        <form action="/payment" method="post">
            @csrf 
            <div class="form-group">
                <label>Credit Card</label>
                <input type="text" name="card" class="form-control col-6" id="card">
                @if ($errors->has('card'))
                    <label class = "alert alert-danger" >{{ $errors->first('card') }}</label>
                @endif
            </div>
            <h4 class="">Order total {{ $total }}</h4>
            <input type="hidden" name="uid" value="{{ session('user')->id }}">
            <input type="submit" class="btn btn-dark" name="payment">
        </form>
    </div>
</div>
@stop