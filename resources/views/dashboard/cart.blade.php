@extends('dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.del').click(function(e){
            var cid = $(this).attr('cid');
            $.ajax({
                url:"{{ url('/deleteCartItem') }}",
                method:'delete',
                data: {_token: '{{ csrf_token() }}', cid:cid},
                success:function(response) {
                    console.log(response)
                    window.location.reload()
                }
            })
        })
        
        $(".change").on("change", function() {
            let count = $(this).val();
            let qid = $(this).attr('qid');
            $.ajax({
                url:"{{ url('/updateQuantity') }}",
                method:'post',
                data:{_token:'{{ csrf_token() }}','quantity':count,'qid':qid},
                success:function(response) {
                    console.log(response)
                    window.location.reload()
                }
            })
        });
        
    })
    
</script>
<div class="container">
    <h1>Shopping Cart</h1>
    <div style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; border-radius: 8px;">


    <table class="table ml-auto mr-auto mt-5" style="width: 80% ">
        <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;" scope="col">Image</th>
              <th style="text-align: center; vertical-align: middle;" scope="col">Name</th>
              <th style="text-align: center; vertical-align: middle;" scope="col">Price</th>
              <th style="text-align: center; vertical-align: middle;" scope="col">Quantity</th>
              <th style="text-align: center; vertical-align: middle;" scope="col">Total</th>
              <th  style="text-align: center; vertical-align: middle;"scope="col">Actions</th>
            </tr>
          </thead>
        <tbody>
            @php
                $total = 0;
                $count = 0;
            @endphp
            
            @foreach ($cartItems as $item )
            
            <tr>
              <th scope="row" style="text-align: center; vertical-align: middle;">
                <img src="{{asset('/uploads/'.$item->image_path)}}" style="width: 50px; align-self: center;" class="card-img-top" alt="image">
              </th>
              <td style="text-align: center; vertical-align: middle;">{{ $item->name }}</td>
              <td style="text-align: center; vertical-align: middle;" class="text-primary ">{{ $item->price }} <i class="fas fa-rupee-sign"></i></td>
              <td style="text-align: center; vertical-align: middle;"><input type="number" qid = "{{ $item->id }}" class="text-center form-control change" value="{{ $item->quantity }}" min="1" max="10"> </td>
              <td style="text-align: center; vertical-align: middle;">{{ $item->price * $item->quantity}} <i class="fas fa-rupee-sign"></i></td>
              <td style="text-align: center; vertical-align: middle;" ><a href="javascript:void(0)" cid = "{{ $item->id }}" class="text-dark del"><i class="fas fa-trash-alt"></i></a></td>
            
            </tr>
            @php
                $total += ($item->price * $item->quantity);
                $count = $count + 1;
            @endphp
            @endforeach
            
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <td style="text-align: center; vertical-align: middle;"> Total</td>
                <td style="text-align: center; vertical-align: middle;" class="text-danger text-weight-bold"> {{ $total }} <i class="fas fa-rupee-sign"></i></td>
                @if ( $total != 0)
                    <td class="text-center">
                        <a href="checkout/{{ $total }}" class="btn btn-warning">Checkout</a>
                    </td>
                @else
                <td class="text-center">
                    <a href="#" class="btn btn-warning">Checkout</a>
                </td>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block mt-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; border-radius: 8px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                
            </tr>
        </tbody>
    </table>
</div>
</div>

@stop