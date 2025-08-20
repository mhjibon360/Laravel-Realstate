@php
    $userroutes = Route::currentRouteName();
@endphp
<div class="blog-sidebar">
    <div class="sidebar-widget post-widget">
        <div class="widget-title">
            <h4>Your Profile </h4>
        </div>
        <div class="post-inner">
            <div class="post">
                <figure class="post-thumb">
                    <a href="javascript::void();">
                        <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                            alt="">
                    </a>
                </figure>
                <h5><a href="javascript::void();">{{ Auth::user()->name }}</a>
                </h5>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>


    <div class="sidebar-widget category-widget">
        <div class="widget-title">
            <h4>Menu</h4>
        </div>
        <div class="widget-content">
            <ul class="category-list ">

                <li>
                    <a href="{{ route('dashboard') }}" class="{{ $userroutes == 'dashboard' ? 'text-success' : '' }}">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('edit.profile') }}"
                        class="{{ $userroutes == 'edit.profile' ? 'text-success' : '' }}">
                        <i class="fal fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('change.password') }}"
                        class="{{ $userroutes == 'change.password' ? 'text-success' : '' }}">
                        <i class="far fa-key-skeleton"></i>
                        Change Password
                    </a>
                </li>
                <li>
                    <a href="{{ route('wishlist.index') }}"
                        class="{{ $userroutes == 'wishlist.index' ? 'text-success' : '' }}">
                        <i class="fal fa-heart"></i>
                        My Wishlist
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('post')
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
