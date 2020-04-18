<div class="sidebar mt-2">
    <ul class="list-unstyled">
        <a href="{{route('dashbord.index')}}"><li class="fa fa-home">@if(app()->getLocale() =='ar') @lang('site.home') @else Home @endif</li></a>
        @if(auth()->user()->hasPermission('read-categories'))
        <a href="{{route('dashbord.categoryies.index')}}"><li class="fa fa-align-justify">@if(app()->getLocale() =='ar') @lang('site.categories') @else categories @endif</li></a>
        @endif
        @if(auth()->user()->hasPermission('read-products'))
        <a href="{{route('dashbord.products.index')}}"><li class="fa fa-shopping-cart">@if(app()->getLocale() =='ar') @lang('site.products') @else products @endif</li></a>
        @endif
        @if(auth()->user()->hasPermission('read-clients'))
        <a href="{{route('dashbord.clients.index')}}"><li class="fa fa-user-plus">@if(app()->getLocale() =='ar') @lang('site.clients') @else Client @endif</li></a>
        @endif
        @if(auth()->user()->hasPermission('read-users'))
        <a href="{{route('dashbord.users.index')}}"><li class="fa fa-user-plus">@if(app()->getLocale() =='ar') @lang('site.users') @else Users @endif</li></a>
        @endif
    </ul>
</div>
