@extends('dashboard')
@section('content')
<div class="container">
<h4>Add Pizza</h4>
<form method="post" action="/dashboard/postAddPizza" enctype="multipart/form-data">
    @csrf()    
    @if(Session::has('fileError'))
        <div class="alert alert-danger">{{Session::get('fileError')}}</div>
    @endif
    <div class="form-group">
        <label>Pizza Name </label>
        <input type="text" class="form-control" name="name" />
        @if ($errors->has('name'))
            <label class = "alert alert-danger" >{{ $errors->first('name') }}</label>
        @endif
    </div>
    <div class="form-group">
        <label for="Cat">Select Category</label>
        <select name="type" id="Cat" class="form-control">
            <option value='Veg'>Veg</option>
            <option value='NonVeg'>Non-veg</option>
        </select>
        @if ($errors->has('type'))
            <label class = "alert alert-danger" >{{ $errors->first('type') }}</label>
        @endif
    </div>
    <div class="form-group">
        <label>Price </label>
        <input type="number" class="form-control" name="price" />
        @if ($errors->has('price'))
            <label class = "alert alert-danger" >{{ $errors->first('price') }}</label>
        @endif
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
        @if ($errors->has('description'))
            <label class = "alert alert-danger" >{{ $errors->first('description') }}</label>
        @endif
    </div>
    <div class="form-group">
        <label>Image </label>
        <input type="file" class="form-contol" name="file"/>
        @if ($errors->has('file'))
            <label class = "alert alert-danger" >{{ $errors->first('file') }}</label>
        @endif
    </div>
       <input type="submit" value="Submit" class="btn btn-success"/>
</form>


</div>

@stop