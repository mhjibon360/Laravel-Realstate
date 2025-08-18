@extends('backend.layouts.backend-master')
@section('title', 'edit blog tag')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Blog-Tag</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Edit New Blog-tag</h4>
                        <hr>
                        <form action="{{ route('admin.blog-tag.update', $tag->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!--from group-->
                            <div class="mb-3">
                                <label for="tag_name" class="form-label text-capitalize">Blog Tag Name</label>
                                <input type="text" name="tag_name" id="tag_name"
                                    class="form-control {{ $errors->has('tag_name') ? 'is-invalid' : '' }}"
                                    value="{{ $tag->tag_name }}" />
                                @error('tag_name')
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
