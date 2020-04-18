@if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
        {{-- <link rel="stylesheet" href="{{url('css/noty.css')}}"> --}}
        <link rel="stylesheet" href="{{url('css/rtl/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/rtl/main-rtl.css')}}">
        @else
        <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
        {{-- <link rel="stylesheet" href="{{url('css/noty.css')}}"> --}}
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/main.css')}}">
@endif
