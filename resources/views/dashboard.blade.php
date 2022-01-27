@php 
$data=session('user');
@endphp 
@if(empty($data))
 <script>
     location.href="{{url('/')}}"
 </script>
@endif 

<!doctype html>
<html lang="en">
  <head>
   @include('includes.head')
  </head>
  <body>
      @include('includes.navbar')
      @yield('content')

    @include('includes.footer')
  </body>
</html>