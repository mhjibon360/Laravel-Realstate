@extends('backend.layouts.backend-master')
@section('title', 'manage video')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">video</a></li>
            <li class="breadcrumb-item active" aria-current="page">update</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Update video Informations</h4>
                        <hr>
                        <form action="{{ route('admin.update.video', $video->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $video->id }}">
                            <!--from group-->
                            <div class="mb-3">
                                <label for="link" class="form-label text-capitalize">video Link</label>
                                <input type="text" name="link" id="link"
                                    class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}"
                                    value="{{ $video->link }}" />
                                @error('link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label text-capitalize photo">video Background</label>
                                <input type="file" name="image" id="image"
                                    class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    data-default-file="{{ asset($video->image) }}" />
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
