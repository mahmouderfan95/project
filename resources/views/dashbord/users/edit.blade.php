@extends('dashbord.layouts.mastar')
@section('title','Edit-Users')
@section('content')
    <!-- end of box -->
    <div class="box">
        <h3>@if(app()->getLocale() == 'ar')@lang('site.Edit') @else Edit User @endif</h3>
        @include('dashbord.layouts.error')
        <form action="{{route('dashbord.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.firstName') @else First Name @endif</label>
                <input type="text" name="firstName" class="form-control" value="{{$user->firstName}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.lastName') @else last Name @endif</label>
                <input type="text" name="lastName" class="form-control" value="{{$user->lastName}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.Email') @else Email @endif</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar')@lang('site.Image') @else Image @endif</label>
                <input type="file" name="image" class="form-control image">
            </div>
            <div class="form-group">
                <img src="{{url('uploads/users/' . $user->image)}}" style="width:80px;" class="img-thumbnail img-perview">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.permeisson') @else Permeisson @endif</label>
                <nav>
                    @php
                        $models = ['users','categoryies','products','clients'];
                        $maps   = ['create','read','update','delete'];
                    @endphp
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($models as $index=>$model)
                        <a class="nav-item nav-link {{$index == 0 ?'active' : ''}}" id="nav-home-tab" data-toggle="tab" href="#{{$model}}" role="tab" aria-controls="nav-home" aria-selected="true">@if(app()->getLocale()== 'ar')@lang('site.'. $model) @else @endif</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($models as $index=>$model)
                    <div class="tab-pane fade show {{$index == 0 ? 'active' : ''}}" id="{{$model}}" role="tabpanel" aria-labelledby="nav-home-tab">
                        @foreach($maps as $map)
                        <label><input type="checkbox" name="permession[]" {{$user->hasPermission($map . '-' . $model) ? 'checked' : ''}} value="{{$map .'-' .$model}}">@if(app()->getLocale() == 'ar')@lang('site.' . $map) @else {{$map}} @endif</label>
                        @endforeach

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="@if(app()->getLocale() == 'ar')@lang('site.Edit')@else Edit @endif" class="btn btn-primary">
            </div>
        </form>
        {{-- <form action="{{route('dashbord.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name = "_method" value="PUT">
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar')@lang('site.firstName') @else FirstName @endif</label>
                <input type="text" name="firstName" class="form-control" value="{{$user->firstName}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar')@lang('site.lastName') @else lastName @endif</label>
                <input type="text" name="lastName" class="form-control" value="{{$user->lastName}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar')@lang('site.Email') @else Email @endif</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar')@lang('site.Image') @else Image @endif</label>
                <input type="file" name="image" class="form-control image">
            </div>
            <div class="form-group">
                <img src="{{url('uploads/users/' . $user->image)}}" style="width:80px;" class="img-thumbnail img-perview">
            </div>
            <div class="form-group">
                <label>@if(app()->getLocale() == 'ar') @lang('site.permeisson') @else Permeisson @endif</label>
                <nav>
                    @php
                        $models = ['users','categoryies','products'];
                        $maps   = ['create','read','update','delete']
                    @endphp
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($models as $index=>$model)
                        <a class="nav-item nav-link {{$index == 0 ?'active' : ''}}" id="nav-home-tab" data-toggle="tab" href="#{{$model}}" role="tab" aria-controls="nav-home" aria-selected="true">@if(app()->getLocale()== 'ar')@lang('site.'. $model) @else @endif</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($models as $index=>$model)
                    <div class="tab-pane fade show {{$index == 0 ? 'active' : ''}}" id="{{$model}}" role="tabpanel" aria-labelledby="nav-home-tab">
                        @foreach($maps as $map)
                        <label><input type="checkbox" name="permession[]" {{$user->hasPermission($map . '-' . $model) ? 'checked' : ''}} value="{{$map .'-' .$model}}">@if(app()->getLocale() == 'ar')@lang('site.' . $map) @else {{$map}} @endif</label>
                        @endforeach

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="@if(app()->getLocale() == 'ar')@lang('site.Edit') @else Edit @endif" class="btn btn-primary">
            </div>
        </form> --}}
    </div>
    <!-- end of box -->


@endsection
