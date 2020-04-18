@extends('dashbord.layouts.mastar')
@section('content')
    <!-- dashbord -->
    <div class="dashbord">
        <h2 class="text-center mt-2">@if(app()->getLocale() == 'ar')@lang('site.dashbord') @else Dashbord @endif</h2>
    </div>
    <!-- dashbord -->


@endsection
