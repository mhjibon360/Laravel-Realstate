@extends('backend.layouts.backend-master')
@section('title', 'add new blog-post')
@push('admin_style')
    <style>
        #drop-area {
            border: 2px dashed #092a78;
            border-radius: 12px;
            padding: 40px;
            cursor: pointer;
            transition: 0.3s;
            text-align: center
        }

        #drop-area.hover {
            background: #e8f5e9;
        }

        #drop-area p {
            font-size: 16px;
            color: #ffffffc3;
        }

        #fileElem {
            display: none;
        }

        .preview {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .preview-item {
            position: relative;
        }

        .preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background: #4CAF50;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Blog-post</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-1">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Add New Blog-post</h4>
                        <hr>
                        <form action="{{ route('admin.blog-post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="title" class="form-label text-capitalize">blog-post title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    value="{{ old('title') }}" />
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!--from group-->
                            <div class="mb-3">
                                <label for="category_id" class="form-label text-capitalize">blog-post
                                    Category</label>
                                <select name="category_id" id="category_id"
                                    class="form-control js-example-basic-single form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                    @foreach ($allblogcategory as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="details" class="form-label text-capitalize">blog-post
                                    Details</label>
                                <textarea name="details" id="tinymceExample" rows="5"
                                    class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}">{{ old('details') }}</textarea>
                                @error('details')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!--from group-->
                            <div class="mb-3">
                                <label for="tag_id" class="form-label text-capitalize">blog-post
                                    Tag</label>
                                <select name="tags[]" id="tag_id"
                                    class="js-example-basic-multiple form-select {{ $errors->has('tag_id') ? 'is-invalid' : '' }}"
                                    multiple="multiple">
                                    @foreach ($allblogtag as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label text-capitalize photo">Blog Thumbnail</label>
                                <input type="file" name="thumbnail" id="photo"
                                    class="form-control {{ $errors->has('page_statistics_image') ? 'is-invalid' : '' }}" />
                                @error('page_statistics_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="my-3">
                                <button type="submit" class=" btn btn-primary">Save Now</button>
                                <a href="{{ route('admin.dashboard') }}" class="ms-2 mt-3 btn btn-danger">Cancel</a>
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
            $('#photo').dropify();
            $('#thumbnail').dropify();
        });
    </script>
@endpush
