@extends('dashbord.layouts.mastar')
@section('title','Edit product')
@section('content')
<div class="box">
    <h3>@if(app()->getLocale() == 'ar')@lang('site.Edit') @else Edit Product @endif</h3>
        @include('dashbord.layouts.error')
        <form action="{{route('dashbord.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.productName') @else productName @endif</label>
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.productDesc') @else Description @endif</label>
                <textarea name="desc" cols="30" rows="10" class="form-control ckeditor">{{$product->desc}}</textarea>
            </div>

            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.Image') @else Image @endif</label>
                <input type="file" name="image" class="form-control image">
            </div>
            <div class="form-group">
                <img src="{{url('uploads/products/' . $product->image)}}" style="width:80px;" class="img-thumbnail img-perview">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.categoryName') @else categoryName @endif</label>
                <select name="category_id" class="form-control">
                    <option value="0">...</option>
                    @foreach($Categories as $cat)
                    <option value="{{$cat->id}}" {{$product->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.Purchasing_price') @else Purchasing_price @endif</label>
                <input type="number" name="Purchasing_price" class="form-control" value="{{$product->Purchasing_price}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.selling_price') @else selling_price @endif</label>
                <input type="number" name="selling_price" class="form-control" value="{{$product->selling_price}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.stock') @else Stock @endif</label>
                <input type="number" name="stock" class="form-control" value="{{$product->stock}}">
            </div>
            <div class="form-group">
                <input class = "btn btn-info" type="submit" value="@if(app()->getLocale() == 'ar') @lang('site.add') @else Add @endif">
            </div>




        </form>

</div>


@endsection
