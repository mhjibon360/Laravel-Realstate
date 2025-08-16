@php
    $routeurl = Route::currentRouteName();
    // dd($routeurl);
@endphp
@extends('agent.layouts.agent-master')
@section('title', 'your profile')
@push('agent_style')
    <style>
        .cover_photo {
            position: relative;
            width: 100%;
        }

        .cover_photo::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background: #090909;
            opacity: .8;
        }
    </style>
@endpush
@section('agent_content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="position-relative">
                    <figure class="overflow-hidden mb-0 d-flex justify-content-center cover_photo">
                        <img src="{{ isset(Auth::user()->cover_photo) ? asset(Auth::user()->cover_photo) : 'https://placehold.co/1600x300' }}"
                            style="width: 100%;height:300px;" class="rounded-top " alt="profile cover" />
                    </figure>
                    <div
                        class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                        <div>
                            <img class=" rounded-circle shadow"
                                style="height: 100%; width:100%;max-height:80px;max-width:80px;"
                                src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                                alt="profile" />
                            <span class="h4 ms-3 text-white">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="d-none d-md-block">
                            <button class="btn btn-primary btn-icon-text">
                                <i data-feather="edit" class="btn-icon-prepend"></i>
                                profile
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3 rounded-bottom">
                    <ul class="d-flex align-items-center m-0 p-0">

                        <li class="d-flex align-items-center  {{ $routeurl == 'agent.edit.profile' ? 'active' : '' }}">
                            <i class="me-1 icon-md  {{ $routeurl == 'agent.edit.profile' ? 'text-primary' : 'text-white' }}"
                                data-feather="columns"></i>
                            <a class="pt-1px d-none d-md-block {{ $routeurl == 'agent.edit.profile' ? 'text-primary' : 'text-white' }}"
                                href="#">Profile</a>
                        </li>
                        &nbsp;&nbsp;&nbsp;
                        <li class="d-flex align-items-center {{ $routeurl == 'agent.change.password' ? 'active' : '' }}">
                            <i class="me-1 icon-md {{ $routeurl == 'agent.change.password' ? 'text-primary' : 'text-white' }}"
                                data-feather="columns"></i>
                            <a class="pt-1px d-none d-md-block {{ $routeurl == 'agent.change.password' ? 'text-primary' : 'text-white' }}"
                                href="#">Password</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">About</h6>
                        <div class="dropdown">
                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i>
                                    <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="git-branch" class="icon-sm me-2"></i>
                                    <span class="">Update</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                                        class="icon-sm me-2"></i>
                                    <span class="">View all</span></a>
                            </div>
                        </div>
                    </div>
                    <p>
                        Hi! {{ Auth::user()->details }}.
                    </p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted"> {{ Auth::user()->created_at->format('F d,Y') }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted">{{ Auth::user()->address }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">phone:</label>
                        <p class="text-muted">{{ Auth::user()->phone }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="{{ Auth::user()->facebook }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="{{ Auth::user()->twitter }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="{{ Auth::user()->google }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-9 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4>Change Password</h4>
                        <hr>
                        <form action="{{ route('agent.update.password') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                            <!--from group-->
                            <div class="mb-3">
                                <label for="password" class="form-label text-capitalize">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    value="" />
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="new_password" class="form-label text-capitalize">New Password</label>
                                <input type="password" name="new_password" id="new_password"
                                    class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                                    value="" />
                                @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label text-capitalize">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                                    value="" />
                                @error('confirm_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="my-3">
                                <button type="submit" class=" btn btn-warning">Change Password</button>
                                <a href="{{ route('agent.dashboard') }}" class=" btn btn-danger">Cancel</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->

    </div>
@endsection
