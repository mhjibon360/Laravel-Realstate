@extends('frontend.layouts.frontend-master')
@section('title', 'category wise')
@section('main')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1"
                style="background-image: url({{ asset('frontend') }}/{{ asset('frontend') }}/assets/images/shape/shape-9.png);">
            </div>
            <div class="pattern-2"
                style="background-image: url({{ asset('frontend') }}/{{ asset('frontend') }}/assets/images/shape/shape-10.png);">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Category- {{ $categoryproperty->category_name }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>{{ $categoryproperty->category_slug }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- page-content end -->
    <div class="page-content clearfix">


        <div class="right-column pull-right">


            <!-- deals-style-two -->
            <section class="deals-style-two">
                <div class="auto-container">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h5>{{ $categoryproperty->category_name }}: <span>{{ count($categorywiseproperty) }}
                                    property</span></h5>
                        </div>
                        <div class="right-column pull-right clearfix">
                            <div class="short-box clearfix">
                                <div class="select-box">

                                </div>
                            </div>
                            <div class="short-menu clearfix">
                                <button class="list-view "><i class="icon-35"></i></button>
                                <button class="grid-view on"><i class="icon-36"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper grid">
                        <div class="deals-list-content list-item">
                            @foreach ($categorywiseproperty as $property)
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image">
                                                <img src="{{ asset($property->thumbnail) }}"
                                                    style="height: 350px; object-fit: cover" alt="">
                                            </figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">{{ $property->propertycategory->category_name }}</span>
                                            <div class="buy-btn ml-4">
                                                @if ($property->buy_rent_type == 'buy')
                                                    <a href="property-details.html" class="ml-2">For Buy</a>
                                                @else
                                                    <a href="property-details.html" class="ml-2">For Rent</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4>
                                                    <a
                                                        href="{{ route('property.details', $property->property_slug) }}">{{ Str::words($property->property_name, '6', ' ') }}</a>
                                                </h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    @if ($property->discount_price)
                                                        <h4>${{ $property->discount_price }}</h4>
                                                        <h4 class="text-secondary"><del>${{ $property->price }}</del></h4>
                                                    @else
                                                        <h4>${{ $property->price }}</h4>
                                                        <br />
                                                    @endif
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="{{ isset($property->users->photo) ? asset($property->users->photo) : Avatar::create($property->users->name)->toBase64() }}"
                                                            alt="">
                                                        <span>{{ $property->users->name }}</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor
                                                incididunt
                                                labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>{{ $property->bedroom }} Beds</li>
                                                <li><i class="icon-15"></i>{{ $property->bath_rooms }} Baths</li>
                                                <li><i class="icon-16"></i>{{ $property->property_size }}</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left">
                                                    <a href="{{ route('property.details', $property->property_slug) }}"
                                                        class="theme-btn btn-two">See Details</a>
                                                </div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="deals-grid-content grid-item">
                            <div class="row clearfix">
                                @foreach ($categorywiseproperty as $property)
                                    <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                        <div class="feature-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image">
                                                        <img src="{{ asset($property->thumbnail) }}"
                                                            style="height: 370px; object-fit: cover" alt="">
                                                    </figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span
                                                        class="category">{{ $property->propertycategory->category_name }}</span>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="author-info clearfix">
                                                        <div class="author pull-left">
                                                            <figure class="author-thumb">
                                                                <img src="{{ isset($property->users->photo) ? asset($property->users->photo) : Avatar::create($property->users->name)->toBase64() }}"
                                                                    alt="">
                                                            </figure>
                                                            <h6>{{ $property->users->name }}</h6>
                                                        </div>
                                                        <div class="buy-btn pull-right">
                                                            @if ($property->buy_rent_type == 'buy')
                                                                <a href="property-details.html">For Buy</a>
                                                            @else
                                                                <a href="property-details.html">For Rent</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="title-text">
                                                        <h4><a
                                                                href="{{ route('property.details', $property->property_slug) }}">{{ Str::words($property->property_name, '6', ' ') }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            @if ($property->discount_price)
                                                                <h4>${{ $property->discount_price }}</h4>
                                                                <h4 class="text-secondary">
                                                                    <del>${{ $property->price }}</del>
                                                                </h4>
                                                            @else
                                                                <h4>${{ $property->price }}</h4>
                                                                <br />
                                                            @endif
                                                        </div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                            </li>
                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p>{!! Str::words(strip_tags($property->property_descriptions), '8', '...') !!}</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>{{ $property->bedroom }} Beds</li>
                                                        <li><i class="icon-15"></i>{{ $property->bath_rooms }} Baths</li>
                                                        <li><i class="icon-16"></i>{{ $property->property_size }}</li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="{{ route('property.details', $property->property_slug) }}"
                                                            class="theme-btn btn-two">See Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pagination-wrapper">
                        {!! $categorywiseproperty->links('pagination::my-pagination') !!}
                    </div>
                </div>
            </section>
            <!-- deals-style-two end -->
        </div>

    </div>
    <!-- page-content end -->
@endsection
