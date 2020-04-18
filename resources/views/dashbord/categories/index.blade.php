@extends('dashbord.layouts.mastar')
@section('title','Categories')
@section('content')
<div class="box">
    <h3 class="mb-3">@if(app()->getLocale() == 'ar') @lang('site.categories') @else Users @endif</h3>
        <!-- start of search -->
        <form action="{{route('dashbord.categoryies.index')}}" method="GET">
            {{ csrf_field() }}
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="search" name="search" class="form-control" placeholder="@if(app()->getLocale() =='ar') @lang('site.search')@else Search @endif" required = "required" value = "{{request()->search}}">
                    </div>
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" value="@if(app()->getLocale() =='ar') @lang('site.search') @else Search @endif" class="btn btn-primary"><i name ="search-icon" class = 'fa fa-search fa-fw'></i>
                        @if(auth()->user()->hasPermission('create-categories'))
                        <a href="{{route('dashbord.categoryies.create')}}" class="btn btn-primary">@if(app()->getLocale() =='ar') @lang('site.add')<i class="fa fa-plus fa-fw"></i>@else<i class="fa fa-plus fa-fw"></i>Add @endif</a>
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
        @if($categories->count() > 0)
            <!-- table of categories -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.categoryName') @else CategoryName @endif</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.product_count') @else Product Count @endif</td>
                    <td>@if(app()->getLocale() == 'ar')@lang('site.related_product')@else Related product @endif</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.Action') @else Action @endif</td>


                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->product->count()}}</td>
                    <td><a class = "btn btn-primary" href="{{route('dashbord.products.index',['category_id' => $cat->id])}}">@if(app()->getLocale() == 'ar')@lang('site.related_product')@else Related product @endif</a></td>
                    <td>
                        <a href="{{route('dashbord.categoryies.edit',$cat->id)}}" class="btn btn-info">@if(app()->getLocale() == 'ar') @lang('site.Edit') @else Edit @endif</a>
                        <form action="{{route('dashbord.categoryies.destroy',$cat->id)}}" method="POST" style="display:inline-block" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type = "submit" class="btn btn-danger confirm">@if(app()->getLocale() == 'ar')  @lang('site.delete') @else Delete @endif</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->appends(request()->query())->links()}}
        <!-- End table of categories -->
        @else
        <p class="alert alert-danger">@if(app()->getLocale() == 'ar') @lang('site.categories_not_found') @else categories_not_found @endif</p>
        @endif


</div>

@endsection
