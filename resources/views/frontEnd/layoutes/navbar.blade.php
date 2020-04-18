@include('frontEnd.layoutes.navbar-new')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">@if(app()->getLocale() == 'ar') @lang('site.logo') @else Logo @endif</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- ml auto -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item ac1tive">
            <a class="nav-link" href="#">@if(app()->getLocale() == 'ar') @lang('site.Home') @else Home @endif<span class="sr-only">(current)</span></a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="#">{{$category->name}}</a>
            </li>
            @endforeach
        </ul>
        <!-- ml auto -->
        <!-- ml auto -->
        <ul class="navbar-nav mr-auto">
            <form action="#" class="form-search">
                {{ csrf_field() }}
                <input type="search" name="search">
                <input type="submit" value="Search" class="btn btn-success d-inline-block">
            </form>
            <a style = "color:#FFF;font-size:20px" class = "ml-3" href="#"><li><i class="fa fa-search"></i></li></a>
            <a style = "color:#FFF;font-size:20px" href="#"><li><i class="fa fa-shopping-cart"></i></li></a>

        </ul>
        <!-- ml auto -->
        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        </div>
    </div>
</nav>
<!-- navbar -->
@include('frontEnd.layoutes.slider')
