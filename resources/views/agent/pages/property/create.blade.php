@extends('agent.layouts.agent-master')
@section('title', 'add new property')
@push('agent_style')
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
@section('agent_content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Property</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-1">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Add New property</h4>
                        <hr>
                        <form action="{{ route('agent.property.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="property_name" class="form-label text-capitalize">Property Name</label>
                                        <input type="text" name="property_name" id="property_name"
                                            class="form-control {{ $errors->has('property_name') ? 'is-invalid' : '' }}"
                                            value="{{ old('property_name') }}" />
                                        @error('property_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="buy_rent_type" class="form-label text-capitalize">Property
                                            Buy/Rent</label>
                                        <select name="buy_rent_type" id="buy_rent_type"
                                            class="form-control {{ $errors->has('buy_rent_type') ? 'is-invalid' : '' }}">
                                            <option value="buy">Buy</option>
                                            <option value="rent">Rent</option>
                                        </select>
                                        @error('buy_rent_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label text-capitalize">Property
                                            Category</label>
                                        <select name="category_id" id="category_id"
                                            class="form-control js-example-basic-single form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                            @foreach ($allpcategory as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="location_id" class="form-label text-capitalize">Property
                                            Location</label>
                                        <select name="location_id" id="location_id"
                                            class="form-control js-example-basic-single form-select {{ $errors->has('location_id') ? 'is-invalid' : '' }}">
                                            @foreach ($alllocation as $location)
                                                <option value="{{ $location->id }}">{{ $location->location_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('location_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="propertytype_id" class="form-label text-capitalize">Property
                                            Type</label>
                                        <select name="propertytype_id" id="propertytype_id"
                                            class="form-control js-example-basic-single form-select {{ $errors->has('propertytype_id') ? 'is-invalid' : '' }}">
                                            @foreach ($allpropertytype as $ptype)
                                                <option value="{{ $ptype->id }}">{{ $ptype->property_typename }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('propertytype_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label text-capitalize">Property Price</label>
                                        <input type="text" name="price" id="price"
                                            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                            value="{{ old('price') }}" />
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discount_price" class="form-label text-capitalize">Property Discount
                                            Price</label>
                                        <input type="text" name="discount_price" id="discount_price"
                                            class="form-control {{ $errors->has('discount_price') ? 'is-invalid' : '' }}"
                                            value="{{ old('discount_price') }}" />
                                        @error('discount_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="property_descriptions" class="form-label text-capitalize">Property
                                            Details</label>
                                        <textarea name="property_descriptions" id="tinymceExample" rows="5"
                                            class="form-control {{ $errors->has('property_descriptions') ? 'is-invalid' : '' }}">{{ old('property_descriptions') }}</textarea>
                                        @error('property_descriptions')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="garage_size" class="form-label text-capitalize">Property Garaze
                                            Size</label>
                                        <input type="text" name="garage_size" id="garage_size"
                                            class="form-control {{ $errors->has('garage_size') ? 'is-invalid' : '' }}"
                                            value="{{ old('garage_size') }}" />
                                        @error('garage_size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="garaze_count" class="form-label text-capitalize">Property Garaze
                                            Count</label>
                                        <input type="text" name="garaze_count" id="garaze_count"
                                            class="form-control {{ $errors->has('garaze_count') ? 'is-invalid' : '' }}"
                                            value="{{ old('garaze_count') }}" />
                                        @error('garaze_count')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="property_id" class="form-label text-capitalize">Property ID
                                            Number</label>
                                        <input type="text" name="property_id" id="property_id"
                                            class="form-control {{ $errors->has('property_id') ? 'is-invalid' : '' }}"
                                            value="{{ old('property_id') }}" />
                                        @error('property_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="date" class="form-label text-capitalize">Property Build
                                            year</label>
                                        <input type="date" name="year_build" id="year_build"
                                            class="form-control {{ $errors->has('year_build') ? 'is-invalid' : '' }}"
                                            value="{{ old('year_build') }}" />
                                        @error('year_build')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="property_size" class="form-label text-capitalize">Property
                                            Size</label>
                                        <input type="property_size" name="property_size" id="property_size"
                                            class="form-control {{ $errors->has('property_size') ? 'is-invalid' : '' }}"
                                            value="{{ old('property_size') }}" />
                                        @error('property_size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="rooms" class="form-label text-capitalize">Property Room</label>
                                        <input type="text" name="rooms" id="rooms"
                                            class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}"
                                            value="{{ old('rooms') }}" />
                                        @error('rooms')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="bedroom" class="form-label text-capitalize">Property Bed Room</label>
                                        <input type="text" name="bedroom" id="bedroom"
                                            class="form-control {{ $errors->has('bedroom') ? 'is-invalid' : '' }}"
                                            value="{{ old('bedroom') }}" />
                                        @error('bedroom')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="bath_rooms" class="form-label text-capitalize">Property Bath
                                            Room</label>
                                        <input type="text" name="bath_rooms" id="bath_rooms"
                                            class="form-control {{ $errors->has('bath_rooms') ? 'is-invalid' : '' }}"
                                            value="{{ old('bath_rooms') }}" />
                                        @error('bath_rooms')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="tags" class="form-label text-capitalize">Property
                                            Amenites</label>
                                        <input type="text" name="amenities" id="tags"
                                            class="form-control {{ $errors->has('amenities') ? 'is-invalid' : '' }}"
                                            value="{{ old('amenities') }}" data-role="tagsinput" />
                                        @error('amenities')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="address" class="form-label text-capitalize">Property
                                            Address</label>
                                        <input type="text" name="address" id="address"
                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            value="{{ old('address') }}" />
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="country" class="form-label text-capitalize">Property
                                            country</label>
                                        <input type="text" name="country" id="country"
                                            class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                            value="{{ old('country') }}" />
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="state_country" class="form-label text-capitalize">Property
                                            state country</label>
                                        <input type="text" name="state_country" id="state_country"
                                            class="form-control {{ $errors->has('state_country') ? 'is-invalid' : '' }}"
                                            value="{{ old('state_country') }}" />
                                        @error('state_country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="neighborhood" class="form-label text-capitalize">Property
                                            Neighborhood</label>
                                        <input type="text" name="neighborhood" id="neighborhood"
                                            class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}"
                                            value="{{ old('neighborhood') }}" />
                                        @error('neighborhood')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="zip_postal_code" class="form-label text-capitalize">
                                            zip postal code</label>
                                        <input type="text" name="zip_postal_code" id="zip_postal_code"
                                            class="form-control {{ $errors->has('zip_postal_code') ? 'is-invalid' : '' }}"
                                            value="{{ old('zip_postal_code') }}" />
                                        @error('zip_postal_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="city" class="form-label text-capitalize">
                                            City</label>
                                        <input type="text" name="city" id="city"
                                            class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                            value="{{ old('city') }}" />
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label text-capitalize">
                                            longitude</label>
                                        <input type="text" name="longitude" id="longitude"
                                            class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}"
                                            value="{{ old('longitude') }}" />
                                        @error('longitude')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label text-capitalize">
                                            latitude</label>
                                        <input type="text" name="latitude" id="latitude"
                                            class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}"
                                            value="{{ old('latitude') }}" />
                                        @error('latitude')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="photo" class="form-label text-capitalize photo">Static
                                            Image</label>
                                        <input type="file" name="page_statistics_image" id="photo"
                                            class="form-control {{ $errors->has('page_statistics_image') ? 'is-invalid' : '' }}" />
                                        @error('page_statistics_image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label text-capitalize photo">Thumbnail
                                            Image</label>
                                        <input type="file" name="thumbnail" id="thumbnail"
                                            class="form-control thumbnail {{ $errors->has('page_statistics_image') ? 'is-invalid' : '' }}" />
                                        @error('thumbnail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-12">
                                    <div class="mb-3 mt-3">
                                        <label for="image_name" class="form-label text-capitalize photo">Multiple
                                            Photo</label>
                                        {{-- <input type="file" name="image_name[]" multiple> --}}

                                        <div id="drop-area">
                                            <p>Drag & Drop Files Here</p>
                                            <p>or click to browse</p>
                                            <input type="file" id="fileElem" name="image_name[]" multiple>
                                        </div>
                                        <div class="preview" id="preview"></div>
                                    </div>

                                </div>
                                <hr>
                                <h3 class=" my-2">What’s Nearby? <button id="btnPlus"
                                        class="btnPlus btn btn-inverse-light" type="button">Add More</button> </h3>

                                <hr>
                                <hr>
                                <div class=" nearby_holder" id="nearby_holder">
                                </div>
                            </div>
                            <hr>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="hot_property"
                                            id="hot_property" value="1">
                                        <label class="form-check-label" for="hot_property">
                                            Hot Property
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="featured_property"
                                            id="featured_property" value="1">
                                        <label class="form-check-label" for="featured_property">
                                            Featured Property
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3">
                                <button type="submit" class=" btn btn-primary">Save Now</button>
                                <a href="{{ route('agent.dashboard') }}" class="ms-2 mt-3 btn btn-danger">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->

    </div>
@endsection

@push('agent_script')
    <script>
        $(document).ready(function() {

            let template = `
                            <div class="row clone_group" id="clone_group">
                                        <div class="col-md-6">
                                            <div class="my-3">
                                                <label for="nearby_group_name" class="form-label text-capitalize">Nearby
                                                    Groupname</label>
                                                <select name="nearby_group_name[]" id="nearby_group_name"
                                                    class="form-control {{ $errors->has('nearby_group_name') ? 'is-invalid' : '' }}">
                                                    <option value="Education"> Education</option>
                                                    <option value="Restaurant"> Restaurant</option>
                                                    <option value="Health & Medical"> Health & Medical</option>
                                                </select>
                                                @error('nearby_group_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="my-3">
                                                <label for="nearby_group_title" class="form-label text-capitalize">Nearyby
                                                    Facility</label>
                                                <input type="text" name="nearby_group_title[]" id="nearby_group_title"
                                                    class="form-control {{ $errors->has('nearby_group_title') ? 'is-invalid' : '' }}">
                                                @error('nearby_group_title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" text-end">
                                            <button type="button" id="remove_btn"
                                                class="remove_btn btn-sm btn btn-danger d-inline-block text-end">remove</button>
                                        </div>
                                    </div>
            `;
            $('.btnPlus').click(function(e) {
                e.preventDefault();
                $('.nearby_holder').append(template);
            });

            $(document).on('click', '.remove_btn', function() {
                $(this).closest('.clone_group').remove();
            });

        });
    </script>

    <script>
        $(function() {
            'use strict';
            $('#photo').dropify();
            $('#thumbnail').dropify();
        });
    </script>


    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileElem");
        const preview = document.getElementById("preview");
        let filesArray = [];

        // Click to open file browser
        dropArea.addEventListener("click", () => fileInput.click());

        // Drag events
        ["dragenter", "dragover"].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                e.stopPropagation();
                dropArea.classList.add("hover");
            }, false);
        });
        ["dragleave", "drop"].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                e.stopPropagation();
                dropArea.classList.remove("hover");
            }, false);
        });

        // Drop files
        dropArea.addEventListener("drop", e => {
            const dt = e.dataTransfer;
            const files = Array.from(dt.files);
            addFiles(files);
        });

        // File input change
        fileInput.addEventListener("change", e => {
            addFiles(Array.from(fileInput.files));
        });

        // Add files to array & show preview
        function addFiles(files) {
            files.forEach(file => {
                filesArray.push(file);
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement("div");
                    div.classList.add("preview-item");
                    div.innerHTML = `<img src="${e.target.result}" alt="${file.name}">
                             <button class="remove-btn">&times;</button>`;
                    preview.appendChild(div);

                    div.querySelector(".remove-btn").addEventListener("click", () => {
                        filesArray = filesArray.filter(f => f !== file);
                        preview.removeChild(div);
                        updateFileInput();
                    });
                }
                reader.readAsDataURL(file);
            });
            updateFileInput();
        }

        // Update hidden input for form submit
        function updateFileInput() {
            const dataTransfer = new DataTransfer();
            filesArray.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        }
    </script>
@endpush
