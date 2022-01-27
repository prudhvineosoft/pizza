<!doctype html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
    <div class="container pt-5 pb-5">
        @if (Session::has('new_user_added'))
            <label class="alert alert-success">{{ session::get('new_user_added') }}</label>
            <a href="/" class="btn btn-primary">Login</a>
          @endif
        @if (Session::has('error'))
        <label class="alert alert-danger">{{ session::get('error') }}</label>
        @endif
        <form action="postSignup" method="post" enctype="multipart/form-data" class="col-5">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name ="name" class="form-control" id="name" />
                @if ($errors->has('name'))
                    <label class = "alert alert-danger" >{{ $errors->first('name') }}</label>
                @endif
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="number" name ="mobile" class="form-control" id="mobile" />
                @if ($errors->has('mobile'))
                    <label class = "alert alert-danger" >{{ $errors->first('mobile') }}</label>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @if ($errors->has('email'))
                    <label class = "alert alert-danger" >{{ $errors->first('email') }}</label>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
                @if ($errors->has('password'))
                    <label class = "alert alert-danger" >{{ $errors->first('password') }}</label>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @include('includes.footer')
  </body>
</html>
