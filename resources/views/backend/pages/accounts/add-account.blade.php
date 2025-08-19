@extends('backend.layouts.backend-master')
@section('title', 'your profile')
@section('content')
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4>Add New Agent</h4>
                        <hr>
                        <form action="{{ route('admin.store.account') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="row">
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-capitalize">Full Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            value="{{ old('name') }}" />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-capitalize">E-mail</label>
                                        <input type="text" name="email" id="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            value="{{ old('name') }}" />
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
                                            value="{{ old('name') }}" />
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
                                            value="{{ old('name') }}" />
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
                                            value="{{ old('name') }}" />
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="role" class="form-label text-capitalize">Select Role</label>
                                        <select name="role" id="role"
                                            class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}">
                                            <option value="agent">Agent</option>
                                            <option value="user">Customer</option>
                                        </select>
                                        @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-capitalize">Password</label>
                                        <input type="text" name="password" id="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            value="{{ old('name') }}" />
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label text-capitalize">Confirm
                                            Password</label>
                                        <input type="text" name="confirm_password" id="confirm_password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            value="{{ old('name') }}" />
                                        @error('confirm_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
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
                                    <img src="" class="mt-2 img-fluid img-thumbnail shadow-sm photo_preview"
                                        id="photo_preview" style="height: 50px;width:50px;" alt="">
                                </div>

                            </div>


                            <div class="my-3">
                                <button type="submit" class=" btn btn-primary">Create Account</button>
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
