@extends('backend.layouts.backend-master')
@section('title', 'manage download ')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Download</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Manage Download</h4>
                        <hr>
                        <form action="{{ route('admin.update.download', $download->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" name="id" value="{{ $download->id }}">
                            <!--from group-->
                            <div class="mb-3">
                                <label for="download_title" class="form-label text-capitalize">Download Title</label>
                                <input type="text" name="download_title" id="download_title"
                                    class="form-control {{ $errors->has('download_title') ? 'is-invalid' : '' }}"
                                    value="{{ $download->download_title }}" />
                                @error('download_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="download_heading" class="form-label text-capitalize">Download heading</label>
                                <input type="text" name="download_heading" id="download_heading"
                                    class="form-control {{ $errors->has('download_heading') ? 'is-invalid' : '' }}"
                                    value="{{ $download->download_heading }}" />
                                @error('download_heading')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label text-capitalize photo">Frame Image</label>
                                <input type="file" name="frame_image" id="image"
                                    class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    data-default-file="{{ asset($download->frame_image) }}" />
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
