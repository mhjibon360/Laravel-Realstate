@extends('backend.layouts.backend-master')
@section('title', 'manage banner')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Banner</a></li>
            <li class="breadcrumb-item active" aria-current="page">update</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Update Banner Informations</h4>
                        <hr>
                        <form action="{{ route('admin.update.banner', $banner->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $banner->id }}">
                            <!--from group-->
                            <div class="mb-3">
                                <label for="heading" class="form-label text-capitalize">Banner Heading</label>
                                <input type="text" name="heading" id="heading"
                                    class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}"
                                    value="{{ $banner->heading }}" />
                                @error('heading')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!--from group-->
                            <div class="mb-3">
                                <label for="title" class="form-label text-capitalize">Banner Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    value="{{ $banner->title }}" />
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label text-capitalize photo">Banner Background</label>
                                <input type="file" name="image" id="image"
                                    class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    data-default-file="{{ asset($banner->image) }}" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="my-3">
                                <button type="submit" class=" btn btn-primary">Save Now</button>
                                <a href="{{ route('admin.dashboard') }}" class="ms-2 btn btn-danger">Cancel</a>
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
        $(function() {
            'use strict';
            $('#image').dropify();
        });
    </script>
@endpush
