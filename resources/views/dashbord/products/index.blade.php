@extends('dashbord.layouts.mastar')
@section('title','Products')
@section('content')
<!-- box -->
<div class="box">
    <h3 class="mb-3">@if(app()->getLocale() == 'ar') @lang('site.products') @else products @endif</h3>
    <!-- start of search -->
    <form action="{{route('dashbord.products.index')}}" method="GET">
        {{ csrf_field() }}
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-4">
                <div class="form-group">
                    <input type="search" name="search" class="form-control" placeholder="@if(app()->getLocale() =='ar') @lang('site.search')@else Search @endif" value = "{{request()->search}}">
                </div>
            </div>
            <!-- col -->
            <!-- col -->
            <div class="col-md-4">
                <div class="form-group">
                    <select name="category_id" class="form-control">
                        <option value="0">...</option>
                        @foreach($Categories as $cat)
                            <option value="{{$cat->id}}" {{request('category_id') == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- col -->
            <!-- col -->
            <div class="col-md-4">
                <div class="form-group">
                    <input type="submit" value="@if(app()->getLocale() =='ar') @lang('site.search') @else Search @endif" class="btn btn-primary"><i name ="search-icon" class = 'fa fa-search fa-fw'></i>
                    @if(auth()->user()->hasPermission('create-users'))
                    <a href="{{route('dashbord.products.create')}}" class="btn btn-primary">@if(app()->getLocale() =='ar') @lang('site.add')<i class="fa fa-plus fa-fw"></i>@else<i class="fa fa-plus fa-fw"></i>Add @endif</a>
                    @else
                    <a href="#" class="btn btn-primary disabled">@if(app()->getLocale() =='ar') @lang('site.add')<i class="fa fa-plus fa-fw"></i>@else<i class="fa fa-plus fa-fw"></i>Add @endif</a>
                    @endif
                </div>
            </div>
            <!-- col -->

        </div>
        <!-- row -->
    </form>
    <!-- End of search -->
    @if($products->count() > 0)
    <table class="table table-hover">
        <tr>
            <thead>
                <td>#</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.productName') @else Name @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.productDesc') @else Description @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.Image') @else Image @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.categoryName') @else CategoryName @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.Purchasing_price') @else Purchasing price @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.selling_price') @else selling  price @endif</td>
                <td>@if(app()->getLocale() == 'ar')@lang('site.profit_precent') % @else profit precent @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.stock') @else Stock @endif</td>
                <td>@if(app()->getLocale() =='ar') @lang('site.Action') @else Action @endif</td>
            </thead>
        </tr>
        @foreach($products as $pro)
        <tr>
            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{!! $pro->desc !!}</td>
            <td><img style = "width:80px" src="{{url('uploads/products/' . $pro->image)}}"></td>
            <td>{{$pro->category()->first()->name}}</td>
            <td>{{$pro->Purchasing_price}}</td>
            <td>{{$pro->selling_price}}</td>
            <td>{{$pro->profit_precent}} %</td>
            <td>{{$pro->stock}}</td>
            <td>
                <a href="{{route('dashbord.products.edit',$pro->id)}}" class="btn btn-info">@if(app()->getLocale() == 'ar')@lang('site.Edit') @else Edit @endif</a>
                <form action="{{route('dashbord.products.destroy',$pro->id)}}" method="POST" style="display:inline-block">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger confirm">@if(app()->getLocale() == 'ar')@lang('site.delete') @else Delete @endif</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$products->appends(request()->query())->links()}}
    @else
    <p class="alert alert-danger">@if(app()->getLocale() =='ar') @lang('site.product_not_found') @else product_not_found @endif</p>
    @endif
</div>
<!-- box -->
@endsection
