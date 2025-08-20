@extends('frontend.layouts.frontend-master')
@section('title', $agent->name . ' profile')
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
                <h1>Agent Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>{{ $agent->username }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- agent-details -->
    <section class="agent-details">
        <div class="auto-container">
            <div class="agent-details-content">
                <div class="agents-block-one">
                    <div class="inner-box mr-0">
                        <figure class="image-box">
                            <img class=" img-thumbnail shadow-sm"
                                src="{{ isset($agent->cover_photo) ? asset($agent->cover_photo) : Avatar::create($agent->username)->toBase64() }}"
                                style="height: 320px; width:270px; object-fit: cover" alt="">
                        </figure>
                        <div class="content-box">
                            <div class="upper clearfix">
                                <div class="title-inner pull-left">
                                    <h4>{{ $agent->username }}</h4>
                                    <span class="designation">{{ $agent->profession }}</span>
                                </div>
                                <ul class="social-list pull-right clearfix">
                                    <li><a href="{{ $agent->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $agent->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $agent->google }}"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <p>{!! $agent->details !!}</p>
                            </div>
                            <ul class="info clearfix mr-0">
                                <li><i class="fab fa fa-envelope"></i><a
                                        href="mailto:{{ $agent->email }}">{{ $agent->email }}</a></li>
                                <li><i class="fab fa fa-phone"></i><a
                                        href="tel:{{ $agent->phone }}">{{ $agent->phone }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agent-details end -->


    <!-- agents-page-section -->
    <section class="agents-page-section agent-details-page">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="agents-content-side tabs-box">
                        <div class="group-title">
                            <h3>Listing By {{ $agent->name }}</h3>
                        </div>
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left">
                                <div class="tab-btn-box">
                                    <span>Result: {{ $agentproperty->total() }}</span>
                                </div>
                            </div>
                            <div class="right-column pull-right clearfix">
                                <div class="short-box clearfix">
                                    <div class="select-box">

                                    </div>
                                </div>
                                <div class="short-menu clearfix">
                                    <button class="list-view on"><i class="icon-35"></i></button>
                                    <button class="grid-view"><i class="icon-36"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="wrapper list">
                                    <div class="deals-list-content list-item">
                                        @foreach ($agentproperty as $property)
                                            <div class="deals-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="{{ asset($property->thumbnail) }}"
                                                                style="height: 350px; width:100%; object-fit: cover"
                                                                alt=""></figure>
                                                        <div class="batch"><i class="icon-11"></i></div>
                                                        <span
                                                            class="category">{{ $property->propertycategory->category_name }}</span>
                                                        <div class="buy-btn">
                                                            @if ($property->buy_rent_type == 'buy')
                                                                <a href="property-details.html">For Buy</a>
                                                            @else
                                                                <a href="property-details.html">For Rent</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="lower-content">
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
                                                            <div class="author-box pull-right">
                                                                <figure class="author-thumb">
                                                                    <img src="{{ isset($property->users->photo) ? asset($property->users->photo) : Avatar::create($property->users->name)->toBase64() }}"
                                                                        style="height: 40px; width: 40px; object-fit: cover"
                                                                        alt="">
                                                                    <span>{{ $property->users->name }}</span>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        <p>{!! Str::words(strip_tags($property->property_descriptions), '8', '...') !!}</p>
                                                        <ul class="more-details clearfix">
                                                            <li><i class="icon-14"></i>{{ $property->bedroom }} Beds</li>
                                                            <li><i class="icon-15"></i>{{ $property->bath_rooms }} Baths
                                                            </li>
                                                            <li><i class="icon-16"></i>{{ $property->property_size }}</li>
                                                        </ul>
                                                        <div class="other-info-box clearfix">
                                                            <div class="btn-box pull-left"><a
                                                                    href="{{ route('property.details', $property->property_slug) }}"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                            <ul class="other-option pull-right clearfix">
                                                                <li><a href="property-details.html"><i
                                                                            class="icon-12"></i></a>
                                                                </li>
                                                                <li><a href="property-details.html"><i
                                                                            class="icon-13"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="deals-grid-content">
                                        <div class="row clearfix">
                                            @foreach ($agentproperty as $property)
                                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                    <div class="feature-block-one">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img
                                                                        src="{{ asset($property->thumbnail) }}"
                                                                        style="height: 250px; object-fit: cover"
                                                                        alt=""></figure>
                                                                <div class="batch"><i class="icon-11"></i></div>
                                                                <span
                                                                    class="category">{{ $property->propertycategory->category_name }}</span>
                                                            </div>
                                                            <div class="lower-content">
                                                                <div class="author-info clearfix">
                                                                    <div class="author pull-left">
                                                                        <figure class="author-thumb"><img
                                                                                src="{{ isset($property->users->photo) ? asset($property->users->photo) : Avatar::create($property->users->name)->toBase64() }}"
                                                                                style="height: 40px; width: 40px; object-fit: cover"
                                                                                alt=" "></figure>
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
                                                                        <li><a href="property-details.html"><i
                                                                                    class="icon-12"></i></a></li>
                                                                        <li><a href="property-details.html"><i
                                                                                    class="icon-13"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <p>{!! Str::words(strip_tags($property->property_descriptions), '8', '...') !!}
                                                                </p>
                                                                <ul class="more-details clearfix">
                                                                    <li><i class="icon-14"></i>{{ $property->bedroom }}
                                                                        Beds</li>
                                                                    <li><i class="icon-15"></i>{{ $property->bath_rooms }}
                                                                        Baths</li>
                                                                    <li><i
                                                                            class="icon-16"></i>{{ $property->property_size }}
                                                                    </li>
                                                                </ul>
                                                                <div class="btn-box"><a
                                                                        href="{{ route('property.details', $property->property_slug) }}"
                                                                        class="theme-btn btn-two">See Details</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar agent-sidebar">
                        <div class="agents-contact sidebar-widget">
                            <div class="widget-title">
                                <h5>Contact To {{ $agent->name }}</h5>
                            </div>
                            <div class="form-inner">
                                @include('frontend.layouts.includes.agent-contact-form')
                            </div>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Status Of Property</h5>
                            </div>
                            <ul class="category-list clearfix">
                                <li><a href="agents-details.html">For Rent <span>({{ $forpropertycount }})</span></a></li>
                                <li><a href="agents-details.html">For Sale <span>({{ $buypropertycount }})</span></a></li>
                            </ul>
                        </div>
                        <div class="featured-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>May You Like</h5>
                            </div>
                            <div class="single-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                                @foreach ($mayyoulikes as $property)
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <img src="{{ asset($property->thumbnail) }}" alt=""
                                                        style="height: 250px; object-fit: cover">
                                                </figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span
                                                    class="category">{{ $property->propertycategory->category_name }}</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title-text">
                                                    <h4><a
                                                            href="{{ route('property.details', $property->property_slug) }}">{{ Str::words($property->property_name, '6', ' ') }}</a>
                                                    </h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info">
                                                        <h6>Start From</h6>
                                                        @if ($property->discount_price)
                                                            <h4>${{ $property->discount_price }}</h4>
                                                            <h4 class="text-secondary"><del>${{ $property->price }}</del>
                                                            </h4>
                                                        @else
                                                            <h4>${{ $property->price }}</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                                <p>{!! Str::words(strip_tags($property->property_descriptions), '8', '...') !!}</p>
                                                <div class="btn-box">
                                                    <a href="{{ route('property.details', $property->property_slug) }}"
                                                        class="theme-btn btn-two">See Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agents-page-section end -->


    <!-- subscribe-section -->
    <section class="subscribe-section bg-color-3">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <span>Subscribe</span>
                        <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <div class="form-inner">
                        <form action="contact.html" method="post" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->
@endsection
