@extends('dashboard')
@section('content')

<div class="container pt-5">
<div class="text-center mt-3">
    @if (session('user')->email == "prudhvi.inumarthi@gmail.com")
        <a href="/dashboard/addPizza" class="btn btn-primary ">add Pizza</a>
    @else
        
    @endif
</div>
<div class="row mt-5">
    @foreach ($menuData as $pizza ) 
    <div class="col-sm-12 col-md-6 col-lg-4 " style="align-self: center;">
        <div class="card text-center mb-3 move-card" style="width: 23rem;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; border-radius: 8px;" >
            <img src="{{asset('/uploads/'.$pizza->image_path)}}" style="width: 60%; align-self: center;" class="card-img-top" alt="image">
            <div class="card-body" style="">
                <form action="/addToCart" method="post">
                    @csrf()  
                    <h5 class="">{{ $pizza->name }}-<span class="text-danger">{{ $pizza->type }}</span></h5>
                    <p class="" style="font-size: 14px; height:50px">{{ $pizza->description }}</p>
                    <h3 class="text-primary">{{ $pizza->price }}/-</h3>
                    <input type="hidden" value="{{ $pizza->name }}" name="name"/>
                    <input type="hidden" value="{{ $pizza->price }}" name="price"/>
                    <input type="hidden" value="{{ $pizza->id }}" name="id"/>
                    <input type="hidden" value="{{ session('user')->id }}" name="userId"/>
                    <input type="hidden" value="{{ session('user')->name }}" name="userName"/>
                    <input type="hidden" value="{{ $pizza->image_path }}" name="image_path"/>
                    <input type="submit" value="Add to Cart" class="btn btn-warning" />
                </form>
            </div>
        </div>
    </div>    
    @endforeach
</div>
</div>
<script type="text/javascript" src="{{ URL::to('/mydata/vanilla-tilt.js') }}"></script>
<script type="text/javascript">
        VanillaTilt.init(document.querySelector(".move-card"), {
            max: 10,
            speed: 400,
            glare: true,
            "max-glare": 0.4,
        });
</script>

@stop