<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <meta charset = "UTF-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>@yield('title')</title>
        @include('frontEnd.layoutes.link-css')
    </head>
    <body>
        @include('frontEnd.layoutes.navbar')
            @yield('content')
        <!-- script -->
        @include('frontEnd.layoutes.script-js')
        <!-- script -->
    </body>
</html>
