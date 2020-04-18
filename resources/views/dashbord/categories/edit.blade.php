@extends('dashbord.layouts.mastar')
@section('title','Edit Categories')
@section('content')
    <!-- start of box -->
<div class="box">
    <h3>@if(app()->getLocale() == 'ar')@lang('site.Edit') @else Edit Category @endif</h3>
    @include('dashbord.layouts.error')
    <form action="{{route('dashbord.categoryies.update',$category->id)}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar')@lang('site.categoryName') @else CateogryName @endif</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>

        <div class="form-group">
            <input type="submit" value="@if(app()->getLocale() == 'ar')@lang('site.Edit') @else Edit @endif" class="btn btn-primary">
        </div>
    </form>
</div>
<!-- end of box -->


@endsection
