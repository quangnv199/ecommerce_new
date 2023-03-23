@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trendding-wrapper">
            <h4>My Orders</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trendding-img" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>Delivery : {{$item->status}}</h5>
                      <h5>Address : {{$item->address}}</h5>
                      <h5>Payment Status : {{$item->payment_status}}</h5>
                      <h5>Payment Method : {{$item->payment_method}}</h5>

                    </div>
             </div>
            </div>
            @endforeach
          </div>
          <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
     </div>
</div>
@endsection 