@extends('dashbord.layouts.mastar')
@section('title','Clients')
@section('content')
<div class="box">
    <h3 class="mb-3">@if(app()->getLocale() == 'ar') @lang('site.clients') @else Clients @endif</h3>
    <!-- start of search -->
    <form action="{{route('dashbord.clients.index')}}" method="GET">
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
                    @if(auth()->user()->hasPermission('create-clients'))
                    <a href="{{route('dashbord.clients.create')}}" class="btn btn-primary">@if(app()->getLocale() =='ar') @lang('site.add')<i class="fa fa-plus fa-fw"></i>@else<i class="fa fa-plus fa-fw"></i>Add @endif</a>
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
    @if($clients->count() > 0)
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>@if(app()->getLocale() == 'ar') @lang('site.clientName') @else clientName @endif</th>
            <th>@if(app()->getLocale() == 'ar') @lang('site.address') @else Address @endif</th>
            <th>@if(app()->getLocale() == 'ar') @lang('site.phone') @else phone number @endif</th>
            <th>@if(app()->getLocale() == 'ar') @lang('site.Action') @else Action @endif</th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->address}}</td>
                <td>{{implode($client->phone,'-')}}</td>
                <td>
                    <a class = "btn btn-primary" href="{{route('dashbord.clients.edit',$client->id)}}">@if(app()->getLocale() == 'ar') @lang('site.Edit') @else Edit @endif</a>
                    <form style = "display:inline-block" action="{{route('dashbord.clients.destroy',$client->id)}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger confirm">@if(app()->getLocale() == 'ar') @lang('site.delete') @else Delete @endif</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>
    {{$clients->appends(request()->query())->links()}}
    @else
        <p class="alert alert-danger">@if(app()->getLocale() == 'ar') @lang('site.clients_not_found') @else clients not found @endif</p>
    @endif
</div>
@endsection
