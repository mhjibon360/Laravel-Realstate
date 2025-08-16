@extends('backend.layouts.backend-master')
@section('title', 'edit property category')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Property-Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Edit Property-category</h4>
                        <hr>
                        <form action="{{ route('admin.property-category.update', $pcategory->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!--from group-->
                            <div class="mb-3">
                                <label for="category_name" class="form-label text-capitalize">Property Category Name</label>
                                <input type="text" name="category_name" id="category_name"
                                    class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}"
                                    value="{{ $pcategory->category_name }}" />
                                @error('category_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--from group-->
                            <div class="mb-3">
                                <label for="category_icon" class="form-label text-capitalize">Icon(only class)</label>
                                <input type="text" name="category_icon" id="category_icon"
                                    class="form-control {{ $errors->has('category_icon') ? 'is-invalid' : '' }}"
                                    value="{{ $pcategory->category_icon }}" />
                                @error('category_icon')
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
