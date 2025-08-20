@extends('frontend.layouts.frontend-master')
@section('title', 'your profile')
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
                <h1>Profile</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>profile</li>
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
                            <h5 class="mb-2 font-weight-bold">Edit Your Profile</h5>
                            <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ Auth::user()->id }}" name="id">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ Auth::user()->name }}" />
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ Auth::user()->email }}" />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                value="{{ Auth::user()->username }}" />
                                            @error('username')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Mobile/Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ Auth::user()->phone }}" />
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Adddress</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ Auth::user()->address }}" />
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Profile Photo</label>
                                            <input type="file" name="photo" id="photo" class="form-control dropify"
                                                data-default-file="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}" />
                                            @error('photo')
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
@push('frontend_script')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endpush
