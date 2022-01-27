
<!doctype html>
<html lang="en">
  <head>
    @include('includes.head')
<div class="container">
    <form action="/postLogin" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="text" name = "user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          @if ($errors->has('user'))
            <label class = "alert alert-danger" >{{ $errors->first('user') }}</label>
          @endif
          @if (Session::has('emailError'))
      <label class="alert alert-danger">{{ session::get('emailError') }}</label>
      @endif
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
          @if ($errors->has('password'))
          <label class = "alert alert-danger" >{{ $errors->first('password') }}</label>
        @endif
        @if (Session::has('passError'))
          <label class="alert alert-danger">{{ session::get('passError') }}</label>
        @endif
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <h5 class="">Don't have an account <a href="/signup">SignUp</a></h5>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
    </div>
    @include('includes.footer')
  </body>
</html>