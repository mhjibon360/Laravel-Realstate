@php
    $userroutes = Route::currentRouteName();
@endphp
<div class="card">
    <div class="card-body">
        <div class=" text-center">
            <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                style="height: 100px;width:100px;object-fit:cover; margin:0 auto;"
                class=" img-fluid img-thumbnail text-center mx-auto" alt="">
            <hr class=" my-1">
            <h4 class=" font-weight-bold ">{{ Auth::user()->name }}</h4>
            <h6 class=" font-weight-normal ">{{ Auth::user()->email }}</h6>
            <span class=" font-weight-light font-italic ">{{ Auth::user()->address }}</span>
        </div>
    </div>
</div>
<!-- user dashboard menu-->
<div class="card mt-3">
    <div class="card-body">
        <div class=" text-center">
            <a href="{{ route('dashboard') }}"
                class="my-3 btn w-full d-block {{ $userroutes == 'dashboard' ? 'btn-success' : 'btn-outline-success ' }}">Dashboard</a>

            <a href="{{ route('edit.profile') }}"
                class="my-3 btn w-full d-block {{ $userroutes == 'edit.profile' ? 'btn-success' : 'btn-outline-success ' }}">Profile</a>

            <a href="{{ route('change.password') }}"
                class="my-3 btn w-full d-block {{ $userroutes == 'change.password' ? 'btn-success' : 'btn-outline-success ' }}">Change
                Password</a>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('POST')
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                    class="my-3 btn w-full d-block {{ $userroutes == 'change.password' ? 'btn-danger' : 'btn-outline-danger ' }}">
                    Logout</a>
            </form>
        </div>
    </div>
</div>
<!-- user dashboard menu end-->
