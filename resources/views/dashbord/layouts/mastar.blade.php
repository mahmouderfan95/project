<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        @include('dashbord.layouts.css-links')
    </head>
    <body>
        @include('dashbord.layouts.navbar')
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-3">
                    @include('dashbord.layouts.sidebar')
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-md-9">
                    <!-- content -->
                    <div class="main">
                        @yield('content')
                    </div>
                <!-- content -->
                </div>
                <!-- col -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
        @include('dashbord.layouts.script-js')
    </body>
</html>
