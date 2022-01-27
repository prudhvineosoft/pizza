
<h3>Thank you {{ session('user')->name }}</h3>
<h4 class="">Order placed Successfully</h4>
<h4>Order details</h4>
<h5>Shop : {{ $name }}</h5>
<table class="table" style="width: 60%">
    <thead>
      <tr>
        <th scope="col">S-no</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
        @php
            $count = 0;
            $total = 0;
        @endphp
        @foreach ($data as $each)
        @php
            $count = $count + 1;
            $total += ($each->price * $each->quantity);
        @endphp
        <tr>
            <th scope="row">{{ $count }}</th>
            <td style="text-align: center; vertical-align: middle;">{{ $each->name }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $each->price }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $each->quantity }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $each->quantity * $each->price}}</td>
          </tr>
        @endforeach
        <tr>
            <th scope="row"></th>
            <td style="text-align: center; vertical-align: middle;"></td>
            <td style="text-align: center; vertical-align: middle;"></td>
            <td style="text-align: center; vertical-align: middle;">Total = </td>
            <td style="text-align: center; vertical-align: middle;">{{ $total }}</td>
          </tr>
    </tbody>
  </table>

