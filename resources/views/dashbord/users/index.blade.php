@extends('dashbord.layouts.mastar')
@section('title','Users')
@section('content')
    <div class="box">
        <h3 class="mb-3">@if(app()->getLocale() == 'ar') @lang('site.users') @else Users @endif</h3>
        <!-- start of search -->
        <form action="{{route('dashbord.users.index')}}" method="GET">
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
                        @if(auth()->user()->hasPermission('create-users'))
                        <a href="{{route('dashbord.users.create')}}" class="btn btn-primary">@if(app()->getLocale() =='ar') @lang('site.add')<i class="fa fa-plus fa-fw"></i>@else<i class="fa fa-plus fa-fw"></i>Add @endif</a>
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
        @if($users->count() > 0)
        <!-- start of table users -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.firstName') @else firstName @endif</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.lastName') @else LastName @endif</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.Email') @else Email @endif</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.Image') @else Image @endif</td>
                    <td>@if(app()->getLocale() == 'ar') @lang('site.Action') @else Action @endif</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td><img src="{{url('uploads/users/' . $user->image)}}" style="width:70px" class="img-thumbnail"></td>
                        <td>
                            @if(auth()->user()->hasPermission('update-users'))
                            <a href="{{route('dashbord.users.edit',$user->id)}}" class="btn btn-info">@if(app()->getLocale() == 'ar') @lang('site.Edit') <i class="fa fa-edit"></i> @else <i class="fa fa-edit"></i> Edit @endif</a>
                            @else
                            <a href="#" class="btn btn-info disabled">@if(app()->getLocale() == 'ar') @lang('site.Edit') @else Edit @endif</a>
                            @endif
                            @if(auth()->user()->hasPermission('delete-users'))
                            <form action="{{route('dashbord.users.destroy',$user->id)}}" style="display:inline-block" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger confirm">@if(app()->getLocale() == 'ar') @lang('site.delete') <i class="fa fa-close"></i> @else <i class="fa fa-close"></i> Delete @endif</button>
                            </form>
                            @else
                            <button class="btn btn-danger disabled">@if(app()->getLocale() == 'ar') @lang('site.Delete') <i class="fa fa-close"></i> @else <i class="fa fa-close"></i> Delete @endif</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- end of table users -->
        {{$users->appends(request()->query())->links()}}
        @else
            <p class="alert alert-danger">@if(app()->getLocale() == 'ar') @lang('site.users_not_found') @else users not found @endif</p>
        @endif
    </div>



@endsection
