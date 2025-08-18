@extends('backend.layouts.backend-master')
@section('title', 'edit choose us')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Choose-us</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Edit Why Choose Us</h4>
                        <hr>
                        <form action="{{ route('admin.us.update', $choose->id) }}" method="post">
                            @csrf
                            @method('put')
                            <!--from group-->
                            <div class="mb-3">
                                <label for="title" class="form-label text-capitalize">choose us Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    value="{{ $choose->title }}" />
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="details" class="form-label text-capitalize">choose us details</label>
                                <input type="text" name="details" id="details"
                                    class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}"
                                    value="{{ $choose->details }}" />
                                @error('details')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="icon" class="form-label text-capitalize">Icon(only class)</label>
                                <input type="text" name="icon" id="icon"
                                    class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}"
                                    value="{{ $choose->icon }}" />
                                @error('icon')
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
