@extends('frontEnd.layoutes.mastar')
@section('title','Website')
@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <!-- col -->
            <div class="col-sm-2 products-all">
                <div class="card" style="height:400px;margin-left:5px">
                    <img class="card-img-top" src="{{url('uploads/products/' . $product->image)}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}}</h5>
                      <p class="card-text">{!!$product->desc!!}</p>
                      <p class="card-text">{{$product->Purchasing_price}}</p>
                      <a href="#" class="btn btn-primary">Add To Cart</a>
                    </div>
                  </div>
            </div>
            <!-- col -->
        @endforeach


    </div>
    <!-- row -->
    {{$products->links()}}

</div>
<!-- container -->
@endsection
