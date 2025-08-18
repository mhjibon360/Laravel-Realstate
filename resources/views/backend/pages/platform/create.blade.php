@extends('backend.layouts.backend-master')
@section('title', 'add new download platform')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Download-platform</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Add Download-platform</h4>
                        <hr>
                        <form action="{{ route('admin.platform.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-4">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="title" class="form-label text-capitalize">Platform Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                            value="{{ old('title') }}" />
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="heading" class="form-label text-capitalize">Platform Name</label>
                                        <input type="text" name="heading" id="heading"
                                            class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}"
                                            value="{{ old('heading') }}" />
                                        @error('heading')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--from group-->
                                    <div class="mb-3">
                                        <label for="icon" class="form-label text-capitalize">Icon(only class)</label>
                                        <input type="text" name="icon" id="icon"
                                            class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}"
                                            value="{{ old('icon') }}" />
                                        @error('icon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="link" class="form-label text-capitalize">Link</label>
                                <input type="text" name="link" id="link"
                                    class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}"
                                    value="{{ old('link') }}" />
                                @error('link')
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
