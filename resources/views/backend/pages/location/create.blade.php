@extends('backend.layouts.backend-master')
@section('title', 'add new location')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Location</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Add New location</h4>
                        <hr>
                        <form action="{{ route('admin.location.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <!--from group-->
                            <div class="mb-3">
                                <label for="location_name" class="form-label text-capitalize">Location Name</label>
                                <input type="text" name="location_name" id="location_name"
                                    class="form-control {{ $errors->has('location_name') ? 'is-invalid' : '' }}"
                                    value="{{ old('location_name') }}" />
                                @error('location_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label text-capitalize photo">Location Image</label>
                                <input type="file" name="location_image" id="photo"
                                    class="form-control {{ $errors->has('location_image') ? 'is-invalid' : '' }}" />
                                @error('location_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <img src="" class="mt-2 img-fluid img-thumbnail shadow-sm photo_preview"
                                id="photo_preview" style="height: 50px;width:50px;" alt="">

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
        $(document).ready(function() {
            $('#photo').change(function(e) {
                e.preventDefault();
                photo_preview.src = URL.createObjectURL(e.target.files[0]);
            });
        });
    </script>
@endpush
