@php
    $routeurl = Route::currentRouteName();
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
        <div class="col-md-8 col-xl-6 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4>Edit Your Profile</h4>
                        <hr>
                        <form action="{{ route('agent.update.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                            <!--from group-->
                            <div class="mb-3">
                                <label for="name" class="form-label text-capitalize">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ Auth::user()->name }}" />
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-capitalize">E-mail</label>
                                        <input type="text" name="email" id="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->email }}" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="username" class="form-label text-capitalize">Username</label>
                                        <input type="text" name="username" id="username"
                                            class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->username }}" />
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label text-capitalize">phone</label>
                                        <input type="text" name="phone" id="phone"
                                            class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->phone }}" />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="address" class="form-label text-capitalize">address</label>
                                        <input type="text" name="address" id="address"
                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->address }}" />
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="" class="form-label text-capitalize">details</label>
                                        <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details"
                                            rows="3">{{ Auth::user()->details }}</textarea>
                                        @error('details')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="profession" class="form-label text-capitalize">profession</label>
                                        <input type="text" name="profession" id="profession"
                                            class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->profession }}" />
                                        @error('profession')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label text-capitalize">facebook</label>
                                        <input type="text" name="facebook" id="facebook"
                                            class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->facebook }}" />
                                        @error('facebook')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="twitter" class="form-label text-capitalize">twitter</label>
                                        <input type="text" name="twitter" id="twitter"
                                            class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->twitter }}" />
                                        @error('twitter')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="google" class="form-label text-capitalize">google</label>
                                        <input type="text" name="google" id="google"
                                            class="form-control {{ $errors->has('google') ? 'is-invalid' : '' }}"
                                            value="{{ Auth::user()->google }}" />
                                        @error('google')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="photo" class="form-label text-capitalize photo">Profile
                                            Photo</label>
                                        <input type="file" name="photo" id="photo"
                                            class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" />
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                                        class="mt-2 img-fluid img-thumbnail shadow-sm photo_preview" id="photo_preview"
                                        style="height: 50px;width:50px;" alt="">
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="cover_photo" class="form-label text-capitalize">Cover
                                            cover_photo</label>
                                        <input type="file" name="cover_photo" id="cover_photo"
                                            class="form-control cover_photo {{ $errors->has('cover_photo') ? 'is-invalid' : '' }}" />
                                        @error('cover_photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <img src="{{ isset(Auth::user()->cover_photo) ? asset(Auth::user()->cover_photo) : Avatar::create(Auth::user()->username)->toBase64() }}"
                                        class="mt-2 img-fluid img-thumbnail shadow-sm cover_photo_preview"
                                        id="cover_photo_preview" style="height: 50px;width:50px;" alt="">
                                </div>
                            </div>
                            <div class="my-3">
                                <button type="submit" class=" btn btn-primary">Save Profile</button>
                                <a href="{{ route('agent.dashboard') }}" class=" btn btn-danger">Cancel</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
        <div class="d-none d-xl-block col-xl-3">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-body">
                            <h6 class="card-title">latest photos</h6>
                            <div class="row ms-0 me-0">
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-2">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-2">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-2">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-2">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-2">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-2">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-0">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-0">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                                <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                    <figure class="mb-0">
                                        <img class="img-fluid rounded" src="https://via.placeholder.com/96x96"
                                            alt="" />
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-body">
                            <h6 class="card-title">suggestions for you</h6>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <div class="d-flex align-items-center hover-pointer">
                                    <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37"
                                        alt="" />
                                    <div class="ms-2">
                                        <p>Mike Popescu</p>
                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                    </div>
                                </div>
                                <button class="btn btn-icon border-0">
                                    <i data-feather="user-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <div class="d-flex align-items-center hover-pointer">
                                    <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37"
                                        alt="" />
                                    <div class="ms-2">
                                        <p>Mike Popescu</p>
                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                    </div>
                                </div>
                                <button class="btn btn-icon border-0">
                                    <i data-feather="user-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <div class="d-flex align-items-center hover-pointer">
                                    <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37"
                                        alt="" />
                                    <div class="ms-2">
                                        <p>Mike Popescu</p>
                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                    </div>
                                </div>
                                <button class="btn btn-icon border-0">
                                    <i data-feather="user-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <div class="d-flex align-items-center hover-pointer">
                                    <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37"
                                        alt="" />
                                    <div class="ms-2">
                                        <p>Mike Popescu</p>
                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                    </div>
                                </div>
                                <button class="btn btn-icon border-0">
                                    <i data-feather="user-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <div class="d-flex align-items-center hover-pointer">
                                    <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37"
                                        alt="" />
                                    <div class="ms-2">
                                        <p>Mike Popescu</p>
                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                    </div>
                                </div>
                                <button class="btn btn-icon border-0">
                                    <i data-feather="user-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center hover-pointer">
                                    <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37"
                                        alt="" />
                                    <div class="ms-2">
                                        <p>Mike Popescu</p>
                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                    </div>
                                </div>
                                <button class="btn btn-icon border-0">
                                    <i data-feather="user-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- right wrapper end -->
    </div>
@endsection
@push('agent_script')
    <script>
        $(document).ready(function() {
            $('#photo').change(function(e) {
                e.preventDefault();
                photo_preview.src = URL.createObjectURL(e.target.files[0]);
            });

            $('#cover_photo').change(function(e) {
                e.preventDefault();
                cover_photo_preview.src = URL.createObjectURL(e.target.files[0]);
            });
        });
    </script>
@endpush
