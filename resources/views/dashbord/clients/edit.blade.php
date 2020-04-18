@extends('dashbord.layouts.mastar')
@section('title','Edit Client')
@section('content')
<h3 class="mb-3">@if(app()->getLocale() == 'ar') @lang('site.Edit') @else Edit @endif</h3>
@include('dashbord.layouts.error')
    <form action="{{route('dashbord.clients.update',$client->id)}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar') @lang('site.clientName') @else clientName @endif</label>
            <input type="text" class="form-control" name="name" value="{{$client->name}}">
        </div>
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar') @lang('site.address') @else Address @endif</label>
            <textarea name="address" cols="30" rows="10" class="form-control">{{$client->address}}</textarea>
        </div>
        @for($i = 0; $i < 2; $i++)
        <div class="form-group">
            <label>@if(app()->getLocale() == 'ar') @lang('site.phone') @else clientName @endif</label>
            <input type="text" class="form-control" name="phone[]" value="{{$client->phone[$i] ?? ''}}">
        </div>
        @endfor
        <div class="form-group">
            <input type="submit" class="btn btn-info" value="@if(app()->getLocale() == 'ar') @lang('site.Edit') @else Edit @endif">
        </div>
    </form>

@endsection
