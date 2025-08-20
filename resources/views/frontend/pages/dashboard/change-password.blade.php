@extends('frontend.layouts.frontend-master')
@section('title', 'change password')
@section('main')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-9.png);">
            </div>
            <div class="pattern-2" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-10.png);">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Password</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>password</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <section class=" my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('frontend.layouts.includes.user-leftmenu')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <nav class="breadcrumb" style="background: #ecf8f1;">
                                <a class="breadcrumb-item text-success" href="javascript::void();">Main</a>
                                <span class="breadcrumb-item active" aria-current="page">profile</span>
                            </nav>
                            <hr>
                            <h5 class="mb-2 font-weight-bold">Change Password</h5>
                            <form action="{{ route('update.password') }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ Auth::user()->id }}" name="id">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Current Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                value="" />
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control" value="" />
                                            @error('new_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password"
                                                class="form-control" value="" />
                                            @error('confirm_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class=" btn btn-success">Save Profile</button>
                                    <a href="{{ route('dashboard') }}" class="ml-2 btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
