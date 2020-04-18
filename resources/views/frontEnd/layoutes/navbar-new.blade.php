<!-- navbar-new -->
<div class="navbar-new text-center">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-6">
                <div class="links">
                    <ul class="list-unstyled mt-2">
                        <a href="#"><li class="d-inline-block">@if(app()->getLocale() == 'ar')@lang('site.contact') @else Contact @endif</li></a> |
                        <a href="#"><li class="d-inline-block"> @if(app()->getLocale() == 'ar') @lang('site.show_order') @else Show Order @endif <i class="fa fa-sort"></i></li></a>
                        <li class="nav-item dropdown d-inline-block">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-language fa-fw"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <ul>
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- col -->
            <!-- col -->
            <div class="col-md-6">
                <div class="phone-info">
                    <p class="mt-2"> @if(app()->getLocale() == 'ar') @lang('site.phone') @else Phone @endif : 01011962928 | <i class="fa fa-envelope-o"></i> @if(app()->getLocale() == 'ar') @lang('site.Email') @else Email @endif: mahmoud@gmail.com</p>
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- navbar-new -->
