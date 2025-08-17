@extends('backend.layouts.backend-master')
@section('title', 'edit testimonial')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Testimonial</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Edit Testimonial</h4>
                        <hr>
                        <form action="{{ route('admin.testimonial.update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="client_name" class="form-label text-capitalize">Client Name</label>
                                        <input type="text" name="client_name" id="client_name"
                                            class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}"
                                            value="{{ $testimonial->client_name }}" />
                                        @error('client_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="client_profession" class="form-label text-capitalize">Client
                                            Profession</label>
                                        <input type="text" name="client_profession" id="client_profession"
                                            class="form-control {{ $errors->has('client_profession') ? 'is-invalid' : '' }}"
                                            value="{{ $testimonial->client_profession }}" />
                                        @error('client_profession')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <!--from group-->
                            <div class="mb-3">
                                <label for="client_message" class="form-label text-capitalize">Client Message</label>
                                <textarea class="form-control {{ $errors->has('client_message') ? 'is-invalid' : '' }}" name="client_message"
                                    id="client_message" rows="4">{{ $testimonial->client_message }}</textarea>
                                @error('client_message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label text-capitalize photo">Client Photo</label>
                                <input type="file" name="client_image" id="image"
                                    class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    data-default-file="{{ asset($testimonial->client_image) }}" />
                                @error('client_image')
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
