@extends('backend.layouts.backend-master')
@section('title', 'add new package')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">package</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class=" text-capitalize fw-semibold">Add New package</h4>
                        <hr>
                        <form action="{{ route('admin.package-plan.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="package_name" class="form-label text-capitalize">package Name</label>
                                        <input type="text" name="package_name" id="package_name"
                                            class="form-control {{ $errors->has('package_name') ? 'is-invalid' : '' }}"
                                            value="{{ old('package_name') }}" />
                                        @error('package_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="package_icon" class="form-label text-capitalize">package Icon</label>
                                        <input type="text" name="package_icon" id="package_icon"
                                            class="form-control {{ $errors->has('package_icon') ? 'is-invalid' : '' }}"
                                            value="{{ old('package_icon') }}" />
                                        @error('package_icon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="package_validitytime" class="form-label text-capitalize">package
                                            Time(Day/Month/year)</label>
                                        <input type="text" name="package_validitytime" id="package_validitytime"
                                            class="form-control {{ $errors->has('package_validitytime') ? 'is-invalid' : '' }}"
                                            value="{{ old('package_validitytime') }}" />
                                        @error('package_validitytime')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="package_cardcolor" class="form-label text-capitalize">package
                                            Card Color</label>
                                        <input type="color" name="package_cardcolor" id="package_cardcolor"
                                            class="form-control {{ $errors->has('package_cardcolor') ? 'is-invalid' : '' }}"
                                            value="{{ old('package_cardcolor') }}" />
                                        @error('package_cardcolor')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-7">
                                    <div class="mb-3">
                                        <label for="package_property" class="form-label text-capitalize">Up to Add
                                            Property</label>
                                        <input type="text" name="package_property" id="package_property"
                                            class="form-control {{ $errors->has('package_property') ? 'is-invalid' : '' }}"
                                            value="{{ old('package_property') }}" />
                                        @error('package_property')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="package_price" class="form-label text-capitalize">package
                                            Price</label>
                                        <input type="text" name="package_price" id="package_price"
                                            class="form-control {{ $errors->has('package_price') ? 'is-invalid' : '' }}"
                                            value="{{ old('package_price') }}" />
                                        @error('package_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="account_dashboard" class="form-label text-capitalize">Account
                                            Dashboard</label>
                                        <input type="text" name="account_dashboard" id="account_dashboard"
                                            class="form-control {{ $errors->has('account_dashboard') ? 'is-invalid' : '' }}"
                                            value="{{ old('account_dashboard') }}" />
                                        @error('account_dashboard')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="account_dashboard_status"
                                            class="form-label text-capitalize">Yes/No</label>
                                        <select name="account_dashboard_status" id="account_dashboard_status"
                                            class="form-control {{ $errors->has('account_dashboard_status') ? 'is-invalid' : '' }}">
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('account_dashboard_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="invoice" class="form-label text-capitalize">Invoice Title</label>
                                        <input type="text" name="invoice" id="invoice"
                                            class="form-control {{ $errors->has('invoice') ? 'is-invalid' : '' }}"
                                            value="{{ old('invoice') }}" />
                                        @error('invoice')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="invoice_status" class="form-label text-capitalize">Yes/No</label>
                                        <select name="invoice_status" id="invoice_status"
                                            class="form-control {{ $errors->has('invoice_status') ? 'is-invalid' : '' }}">
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('invoice_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="online_payment" class="form-label text-capitalize">Online
                                            Payment</label>
                                        <input type="text" name="online_payment" id="online_payment"
                                            class="form-control {{ $errors->has('online_payment') ? 'is-invalid' : '' }}"
                                            value="{{ old('online_payment') }}" />
                                        @error('online_payment')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="online_payment_status"
                                            class="form-label text-capitalize">Yes/No</label>
                                        <select name="online_payment_status" id="online_payment_status"
                                            class="form-control {{ $errors->has('online_payment_status') ? 'is-invalid' : '' }}">
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('online_payment_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="brand_website" class="form-label text-capitalize">Brand
                                            Website</label>
                                        <input type="text" name="brand_website" id="brand_website"
                                            class="form-control {{ $errors->has('brand_website') ? 'is-invalid' : '' }}"
                                            value="{{ old('brand_website') }}" />
                                        @error('brand_website')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="brand_website_status"
                                            class="form-label text-capitalize">Yes/No</label>
                                        <select name="brand_website_status" id="brand_website_status"
                                            class="form-control {{ $errors->has('brand_website_status') ? 'is-invalid' : '' }}">
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('brand_website_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="account_manager" class="form-label text-capitalize">Account
                                            Manager</label>
                                        <input type="text" name="account_manager" id="account_manager"
                                            class="form-control {{ $errors->has('account_manager') ? 'is-invalid' : '' }}"
                                            value="{{ old('account_manager') }}" />
                                        @error('account_manager')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="account_manager_status"
                                            class="form-label text-capitalize">Yes/No</label>
                                        <select name="account_manager_status" id="account_manager_status"
                                            class="form-control {{ $errors->has('account_manager_status') ? 'is-invalid' : '' }}">
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('account_manager_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--from group-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="premium_app" class="form-label text-capitalize">Premium App</label>
                                        <input type="text" name="premium_app" id="premium_app"
                                            class="form-control {{ $errors->has('premium_app') ? 'is-invalid' : '' }}"
                                            value="{{ old('premium_app') }}" />
                                        @error('premium_app')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--from group-->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="premium_app_status" class="form-label text-capitalize">Yes/No</label>
                                        <select name="premium_app_status" id="premium_app_status"
                                            class="form-control {{ $errors->has('premium_app_status') ? 'is-invalid' : '' }}">
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('premium_app_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
