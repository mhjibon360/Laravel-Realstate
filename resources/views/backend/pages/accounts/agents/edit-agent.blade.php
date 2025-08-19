@php
    $routeurl = Route::currentRouteName();
    // dd($routeurl);
@endphp
@extends('backend.layouts.backend-master')
@section('title', 'your profile')
@push('admin_style')
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
@section('content')

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
                        Hi! {{ $agent->details }}.
                    </p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted"> {{ $agent->created_at->format('F d,Y') }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted">{{ $agent->address }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $agent->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">phone:</label>
                        <p class="text-muted">{{ $agent->phone }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="{{ $agent->facebook }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="{{ $agent->twitter }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="{{ $agent->google }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-9 col-xl-9 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4>Edit Your Profile</h4>
                        <hr>
                        <form action="{{ route('admin.update.agent.account', $agent->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $agent->id }}" name="id">
                            <!--from group-->
                            <div class="mb-3">
                                <label for="name" class="form-label text-capitalize">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ $agent->name }}" />
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
                                            value="{{ $agent->email }}" />
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
                                            value="{{ $agent->username }}" />
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
                                            value="{{ $agent->phone }}" />
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
                                            value="{{ $agent->address }}" />
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
                                            rows="3">{{ $agent->details }}</textarea>
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
                                            value="{{ $agent->profession }}" />
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
                                            value="{{ $agent->facebook }}" />
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
                                            value="{{ $agent->twitter }}" />
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
                                            value="{{ $agent->google }}" />
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
                                    <img src="{{ isset($agent->photo) ? asset($agent->photo) : Avatar::create($agent->name)->toBase64() }}"
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
                                    <img src="{{ isset($agent->cover_photo) ? asset($agent->cover_photo) : Avatar::create($agent->username)->toBase64() }}"
                                        class="mt-2 img-fluid img-thumbnail shadow-sm cover_photo_preview"
                                        id="cover_photo_preview" style="height: 50px;width:50px;" alt="">
                                </div>
                            </div>
                            <div class="my-3">
                                <button type="submit" class=" btn btn-primary">Save Profile</button>
                                <a href="{{ route('admin.dashboard') }}" class=" btn btn-danger">Cancel</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->

    </div>
@endsection
@push('admin_script')
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
