@extends('dashbord.layouts.mastar')
@section('title','Create New Category')
@section('content')
<!-- start of box -->
<div class="box">
    <h3>@if(app()->getLocale() == 'ar')@lang('site.add') @else Add New Category @endif</h3>
    @include('dashbord.layouts.error')
    <form action="{{route('dashbord.categoryies.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar')@lang('site.categoryName') @else CateogryName @endif</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <input type="submit" value="@if(app()->getLocale() == 'ar')@lang('site.add') @else Add @endif" class="btn btn-primary">
        </div>
    </form>
</div>
<!-- end of box -->

@endsection
