@extends('backend.layouts.backend-master')
@section('title', 'add new property type')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Property Type</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Add New Property Type</h4>
                        <hr>
                        <form action="{{ route('admin.property-type.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <!--from group-->
                            <div class="mb-3">
                                <label for="property_typename" class="form-label text-capitalize">Property type Name</label>
                                <input type="text" name="property_typename" id="property_typename"
                                    class="form-control {{ $errors->has('property_typename') ? 'is-invalid' : '' }}"
                                    value="{{ old('property_typename') }}" />
                                @error('property_typename')
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
