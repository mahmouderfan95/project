@extends('dashbord.layouts.mastar')
@section('title','Create Name Client')
@section('content')
<div class="box">
    <h3>@if(app()->getLocale() == 'ar')@lang('site.add') @else Add New Category @endif</h3>
    @include('dashbord.layouts.error')
    <form action="{{route('dashbord.clients.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar') @lang('site.clientName') @else clientName @endif</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar') @lang('site.address') @else Address @endif</label>
            <textarea name="address" cols="30" rows="10" class="form-control">{{old('address')}}</textarea>
        </div>
        @for($i = 0; $i < 2; $i++)
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar') @lang('site.phone') @else clientName @endif</label>
            <input type="text" class="form-control" name="phone[]">
        </div>
        @endfor
        <div class="form-group">
            <input type="submit" class="btn btn-info" value="Add">
        </div>
    </form>


</div>


@endsection
