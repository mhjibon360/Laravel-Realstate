@extends('backend.layouts.backend-master')
@section('title', 'general setting')
@section('content')

    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">genealsetting</a></li>
            <li class="breadcrumb-item active" aria-current="page">update</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="row g-5">
                <div class="col-5 col-md-3 pe-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-home-tab" data-bs-toggle="pill" href="#v-home"
                                    role="tab" aria-controls="v-home" aria-selected="true">General Setting</a>
                                <a class="nav-link" id="v-profile-tab" data-bs-toggle="pill" href="#v-profile"
                                    role="tab" aria-controls="v-profile" aria-selected="false">Seo Setting</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-7 col-md-8 mx-auto ps-0">
                    <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
                        <div class="tab-pane fade show active" id="v-home" role="tabpanel" aria-labelledby="v-home-tab">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h4 class=" text-capitalize fw-semibold">General Setting</h4>
                                    <hr>
                                    <form action="{{ route('admin.general.setting.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $genealsetting->id }}">
                                        <div class="row">
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label text-capitalize">Address</label>
                                                    <input type="text" name="address" id="address"
                                                        class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->address }}" />
                                                    @error('address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="number" class="form-label text-capitalize">Phone
                                                        Number</label>
                                                    <input type="text" name="number" id="number"
                                                        class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->number }}" />
                                                    @error('number')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="gmail" class="form-label text-capitalize">E-mail</label>
                                                    <input type="text" name="gmail" id="gmail"
                                                        class="form-control {{ $errors->has('gmail') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->gmail }}" />
                                                    @error('gmail')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="facebook"
                                                        class="form-label text-capitalize">Facebook</label>
                                                    <input type="text" name="facebook" id="facebook"
                                                        class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->facebook }}" />
                                                    @error('facebook')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="twitter" class="form-label text-capitalize">Twitter</label>
                                                    <input type="text" name="twitter" id="twitter"
                                                        class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->twitter }}" />
                                                    @error('twitter')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="pinterest"
                                                        class="form-label text-capitalize">pinterest</label>
                                                    <input type="text" name="pinterest" id="pinterest"
                                                        class="form-control {{ $errors->has('pinterest') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->pinterest }}" />
                                                    @error('pinterest')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="google"
                                                        class="form-label text-capitalize">google</label>
                                                    <input type="text" name="google" id="google"
                                                        class="form-control {{ $errors->has('google') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->google }}" />
                                                    @error('google')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="vimo" class="form-label text-capitalize">vimo</label>
                                                    <input type="text" name="vimo" id="vimo"
                                                        class="form-control {{ $errors->has('vimo') ? 'is-invalid' : '' }}"
                                                        value="{{ $genealsetting->vimo }}" />
                                                    @error('vimo')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="about_details" class="form-label text-capitalize">Footer
                                                        about details</label>
                                                    <textarea class="form-control {{ $errors->has('about_details') ? 'is-invalid' : '' }}" name="about_details"
                                                        id="about_details" rows="4">{{ $genealsetting->about_details }}</textarea>
                                                    @error('about_details')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="header_logo"
                                                        class="form-label text-capitalize photo">Header
                                                        Logo
                                                    </label>
                                                    <input type="file" name="header_logo" id="header_logo"
                                                        class="form-control header_logo {{ $errors->has('header_logo') ? 'is-invalid' : '' }}"
                                                        data-default-file="{{ asset($genealsetting->header_logo) }}" />
                                                    @error('header_logo')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="footer_logo"
                                                        class="form-label text-capitalize photo">Footer
                                                        Logo
                                                    </label>
                                                    <input type="file" name="footer_logo" id="footer_logo"
                                                        class="form-control footer_logo {{ $errors->has('footer_logo') ? 'is-invalid' : '' }}"
                                                        data-default-file="{{ asset($genealsetting->footer_logo) }}" />
                                                    @error('footer_logo')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                        <div class="my-3">
                                            <button type="submit" class=" btn btn-primary">Save Now</button>
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="ms-2 btn btn-danger">Cancel</a>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="v-profile" role="tabpanel" aria-labelledby="v-profile-tab">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h4 class=" text-capitalize fw-semibold">Seo Setting</h4>
                                    <hr>
                                    <form action="{{ route('admin.seo.setting.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $seosetting->id }}">
                                        <div class="row">
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="author_name" class="form-label text-capitalize">Author
                                                        Name</label>
                                                    <input type="text" name="author_name" id="author_name"
                                                        class="form-control {{ $errors->has('author_name') ? 'is-invalid' : '' }}"
                                                        value="{{ $seosetting->author_name }}" />
                                                    @error('author_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="organization_name"
                                                        class="form-label text-capitalize">Companey /Organization
                                                        Name</label>
                                                    <input type="text" name="organization_name" id="organization_name"
                                                        class="form-control {{ $errors->has('organization_name') ? 'is-invalid' : '' }}"
                                                        value="{{ $seosetting->organization_name }}" />
                                                    @error('organization_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="seo_title" class="form-label text-capitalize">Seo
                                                        Title</label>
                                                    <input type="text" name="seo_title" id="seo_title"
                                                        class="form-control {{ $errors->has('seo_title') ? 'is-invalid' : '' }}"
                                                        value="{{ $seosetting->seo_title }}" />
                                                    @error('seo_title')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <!--from group-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="author_details" class="form-label text-capitalize">
                                                        Author/Companey details</label>
                                                    <textarea class="form-control {{ $errors->has('author_details') ? 'is-invalid' : '' }}" name="author_details"
                                                        id="author_details" rows="4">{{ $seosetting->author_details }}</textarea>
                                                    @error('author_details')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--from group-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="seo_details" class="form-label text-capitalize">
                                                        seo details</label>
                                                    <textarea class="form-control {{ $errors->has('seo_details') ? 'is-invalid' : '' }}" name="seo_details"
                                                        id="seo_details" rows="4">{{ $seosetting->seo_details }}</textarea>
                                                    @error('seo_details')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-3">
                                            <button type="submit" class=" btn btn-primary">Save Now</button>
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="ms-2 btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
    <script>
        $(function() {
            'use strict';
            $('#header_logo').dropify();
            $('#footer_logo').dropify();
        });
    </script>
@endpush
