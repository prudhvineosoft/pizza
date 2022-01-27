<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="m-0 p-0" href="#">
      <img src="{{ URL::to('/mydata/logo.jpg') }}" style="width:40px"><span class="text-danger font-weight-bold ml-3">Pizza World</span>
    </a>
    <a class="m-0 p-0" href="#">
      <h6 style = "color: gray" class="ml-3"> {{ session('user')->email }}</h6>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-link active" href="/dashboard/home">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="/dashboard/menu">Menu</a>
        <a class="nav-link" href="/dashboard/cart">Cart <span class="bg-primary rounded-circle pl-2 pr-2 text-light font-weight-bold">{{ session(session('user')->email) }}</span></a>
        <a class="nav-link" href="/dashboard/logout">Logout</a>
      </div>
    </div>
  </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>