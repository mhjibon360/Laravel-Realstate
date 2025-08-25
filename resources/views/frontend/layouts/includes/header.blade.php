@php
    $gensetting = App\Models\GeneralSetting::first();
@endphp
<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>{{ $gensetting->address }}</li>
                    <li><i class="far fa-clock"></i> {{ Carbon\Carbon::now()->format('l,d F Y') }}</li>
                    <li><i class="far fa-phone"></i><a href="tel:{{ $gensetting->number }}">{{ $gensetting->number }}</a>
                    </li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="{{ $gensetting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ $gensetting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ $gensetting->pinterest }}"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="{{ $gensetting->google }}"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="{{ $gensetting->vimo }}"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
                <div class="sign-box">
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}"><i class="fa fa-list"></i>Dashboard</a>
                        &nbsp;&nbsp;
                        <form action="{{ route('logout') }}" method="post" style="display: inline;">
                            @csrf
                            @method('post')
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();"><i
                                    class="fa fa-sign-out"></i>Logout</a>
                        </form>
                    @else
                        <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Sign In</a>
                        &nbsp;
                        <a href="{{ route('register') }}"><i class="fa fa-user-plus"></i>Sign Up</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ route('home.index') }}">
                            <img src="{{ asset($gensetting->header_logo) }}" alt="">
                        </a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ route('home.index') }}"><span>Home</span></a></li>
                                <li><a href="{{ route('about.us') }}"><span>About</span></a></li>

                                <li class="dropdown"><a href="javascript::void();"><span>Listing</span></a>
                                    <ul>
                                        <li><a href="{{ route('our.agent') }}">Agents List</a></li>
                                        <li><a href="{{ route('property.list') }}">Property List</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('property.list') }}"><span>Property</span></a></li>
                                <li><a href="{{ route('all.news') }}"><span>Blog</span></a></li>
                                <li><a href="{{ route('contact.us') }}"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="index.html"><img
                                src="{{ asset('frontend') }}/assets/images/logo.png" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="{{ route('home.index') }}"><img src="{{ asset($gensetting->header_logo) }}"
                    alt="" title=""></a></div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>{{ $gensetting->address }}</li>
                <li><a href="tel:+{{ $gensetting->number }}">+{{ $gensetting->number }}</a></li>
                <li><a href="mailto:{{ $gensetting->gmail }}">{{ $gensetting->gmail }}</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="{{ $gensetting->twitter }}"><span class="fab fa-twitter"></span></a></li>
                <li><a href="{{ $gensetting->facebook }}"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="{{ $gensetting->pinterest }}"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="{{ $gensetting->instagram }}"><span class="fab fa-instagram"></span></a></li>
                <li><a href="{{ $gensetting->youtube }}"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->
