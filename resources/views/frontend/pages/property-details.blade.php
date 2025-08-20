@extends('frontend.layouts.frontend-master')
@section('title', $property->property_slug)
@section('main')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-9.png);">
            </div>
            <div class="pattern-2" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-10.png);">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Property Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>{{ $property->property_slug }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- property-details -->
    <section class="property-details property-details-one">
        <div class="auto-container">
            <div class="top-details clearfix">
                <div class="left-column pull-left clearfix">
                    <h3>{{ $property->property_name }}</h3>
                    <div class="author-info clearfix">
                        <div class="author-box pull-left">
                            <figure class="author-thumb">
                                <img src="{{ isset($property->users->photo) ? asset($property->users->photo) : Avatar::create($property->users->name)->toBase64() }}"
                                    alt="">
                            </figure>
                            <h6>{{ $property->users->name }}</h6>
                        </div>
                        <ul class="rating clearfix pull-left">
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-40"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="right-column pull-right clearfix">
                    <div class="price-inner clearfix">
                        <ul class="category clearfix pull-left">
                            <li><a href="property-details.html">{{ $property->propertycategory->category_name }}</a></li>
                            <li>
                                @if ($property->buy_rent_type == 'buy')
                                    <a href="property-details.html">For Buy</a>
                                @else
                                    <a href="property-details.html">For Rent</a>
                                @endif
                            </li>
                        </ul>
                        <div class="price-box pull-right">
                            @if ($property->discount_price)
                                <h4 class=" text-success">${{ $property->discount_price }}</h4>
                                <h4 class=" text-secondary"><del>${{ $property->price }}</del></h4>
                            @else
                                <h4>${{ $property->price }}</h4>
                                <br>
                            @endif
                        </div>
                    </div>
                    <ul class="other-option pull-right clearfix">
                        <li><a href="property-details.html"><i class="icon-37"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-38"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                        <li><a type="button" id="{{ $property->id }}" onclick="addToWishlist(this.id)"><i class="icon-13"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="property-details-content">
                        <div class="carousel-inner">
                            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                @php
                                    $galleryimages = App\Models\Multiimage::where('product_id', $property->id)->get();
                                @endphp
                                @if (count($galleryimages) > 1)
                                    @foreach ($galleryimages as $gallery)
                                        <figure class="image-box">
                                            <img src="{{ asset($gallery->image_name) }}"
                                                style="height: 520px;object-fit:cover;" alt="">
                                        </figure>
                                    @endforeach
                                @else
                                    <figure class="image-box">
                                        <img src="{{ asset($property->thumbnail) }}"
                                            style="height: 520px;object-fit:cover;" alt="">
                                    </figure>
                                @endif


                            </div>
                        </div>
                        <div class="discription-box content-widget">
                            <div class="title-box">
                                <h4>Property Description</h4>
                            </div>
                            <div class="text">
                                {!! $property->property_descriptions !!}
                            </div>
                        </div>
                        <div class="details-box content-widget">
                            <div class="title-box">
                                <h4>Property Details</h4>
                            </div>
                            <ul class="list clearfix">
                                <li>Property ID: <span>{{ $property->property_id }}</span></li>
                                <li>Rooms: <span>{{ $property->rooms }}</span></li>
                                <li>Garage Size: <span>{{ $property->garage_size }}</span></li>
                                <li>Discount:
                                    @if ($property->discount_price)
                                        <span>Yes</span>
                                    @else
                                        <span>No</span>
                                    @endif
                                </li>
                                <li>Bedrooms: <span>{{ $property->bedroom }}</span></li>
                                <li>Year Built: <span>{{ $property->created_at->format('d M, Y') }}</span></li>
                                <li>Property Type: <span> {{ $property->propertycategory->category_name }}</span></li>
                                <li>Bathrooms: <span>{{ $property->bath_rooms }}</span></li>
                                <li>Property Status: <span>
                                        {{ $property->buy_rent_type == 'buy' ? 'For Buy' : 'For Rent' }}</span></li>
                                <li>Property Size: <span>{{ $property->property_size }}</span></li>
                                <li>Garage: <span>{{ $property->garaze_count }}</span></li>
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Amenities</h4>
                            </div>
                            <ul class="list clearfix">
                                @php
                                    $amenities = explode(',', $property->amenities);
                                @endphp
                                @foreach ($amenities as $ame)
                                    <li>{{ $ame }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="floorplan-inner content-widget">
                            <div class="title-box">
                                <h4>Floor Plan</h4>
                            </div>
                            <ul class="accordion-box">
                                <li class="accordion block active-block">
                                    <div class="acc-btn active">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>First Floor</h5>
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content-box">
                                            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                deserunt mollit anim est laborum. Sed perspiciatis unde omnis iste natus
                                                error sit voluptatem accusa dolore mque laudant.</p>
                                            <figure class="image-box">
                                                <img src="{{ asset('frontend') }}/assets/images/resource/floor-1.png"
                                                    alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Second Floor</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                deserunt mollit anim est laborum. Sed perspiciatis unde omnis iste natus
                                                error sit voluptatem accusa dolore mque laudant.</p>
                                            <figure class="image-box">
                                                <img src="{{ asset('frontend') }}/assets/images/resource/floor-1.png"
                                                    alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Third Floor</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                deserunt mollit anim est laborum. Sed perspiciatis unde omnis iste natus
                                                error sit voluptatem accusa dolore mque laudant.</p>
                                            <figure class="image-box">
                                                <img src="{{ asset('frontend') }}/assets/images/resource/floor-1.png"
                                                    alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="location-box content-widget">
                            <div class="title-box">
                                <h4>Location</h4>
                            </div>
                            <ul class="info clearfix">
                                <li><span>Address:</span> {{ $property->address }}</li>
                                <li><span>Country:</span> {{ $property->country }}</li>
                                <li><span>State/county:</span> {{ $property->country }}</li>
                                <li><span>Neighborhood:</span> {{ $property->neighborhood }}</li>
                                <li><span>Zip/Postal Code:</span> {{ $property->zip_postal_code }}</li>
                                <li><span>City:</span> {{ $property->city }}</li>
                            </ul>
                            <div class="google-map-area">
                                <div class="google-map" id="contact-google-map" data-map-lat="{{ $property->latitude }}"
                                    data-map-lng="{{ $property->longitude }}"
                                    data-icon-path="{{ asset('frontend') }}/assets/images/icons/map-marker.png"
                                    data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12"
                                    data-markers='{
                                            "marker-1": [{{ $property->latitude }}, {{ $property->longitude }}, "<h4>Branch Office</h4><p>77/99 New York</p>","{{ asset('frontend') }}/assets/images/icons/map-marker.png"]
                                        }'>

                                </div>
                            </div>
                        </div>
                        <div class="nearby-box content-widget">
                            <div class="title-box">
                                <h4>What’s Nearby?</h4>
                            </div>
                            <div class="inner-box">
                                @foreach ($allnearbygroup as $group)
                                    <div class="single-item">
                                        <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                        <div class="inner">
                                            <h5>{{ $group->nearby_group_name }}:</h5>
                                            @foreach ($allnearby as $near)
                                                <div class="box clearfix">
                                                    <div class="text pull-left">
                                                        <h6>{{ $near->nearby_group_title }}</h6>
                                                    </div>
                                                    <ul class="rating pull-right clearfix">
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-40"></i></li>
                                                    </ul>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="statistics-box content-widget">
                            <div class="title-box">
                                <h4>Page Statistics</h4>
                            </div>
                            <figure class="image-box">
                                <a href="{{ asset($property->page_statistics_image) }}" class="lightbox-image"
                                    data-fancybox="gallery"><img src="{{ asset($property->page_statistics_image) }}"
                                        alt=""></a>
                            </figure>
                        </div>
                        <div class="schedule-box content-widget">
                            <div class="title-box">
                                <h4>Schedule A Tour</h4>
                            </div>
                            <div class="form-inner">
                                <form action="property-details.html" method="post">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <i class="far fa-calendar-alt"></i>
                                                <input type="text" name="date" placeholder="Tour Date"
                                                    id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <i class="far fa-clock"></i>
                                                <input type="text" name="time" placeholder="Any Time">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Your Name"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Your Email"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <input type="tel" name="phone" placeholder="Your Phone"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <textarea name="message" placeholder="Your message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="author-box">
                                <figure class="author-thumb">
                                    <img src="{{ asset($property->users->photo) }}" alt="">
                                </figure>
                                <div class="inner">
                                    <h4>{{ $property->users->name }}</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $property->users->address }}</li>
                                        <li><i class="fas fa-phone"></i><a
                                                href="tel:03030571965">{{ $property->users->phone }}</a></li>
                                    </ul>
                                    <div class="btn-box"><a href="{{ route('agent.details', ['id' => $property->users->id, 'username' => $property->users->username]) }}">View Listing</a></div>
                                </div>
                            </div>
                            <div class="form-inner">
                                @include('frontend.layouts.includes.agent-contact-form')
                            </div>
                        </div>
                        <div class="calculator-widget sidebar-widget">
                            <div class="calculate-inner">
                                <div class="widget-title">
                                    <h4>Mortgage Calculator</h4>
                                </div>
                                <form method="post" action="mortgage-calculator.html" class="default-form">
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="total_amount" placeholder="Total Amount">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="down_payment" placeholder="Down Payment">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-percent"></i>
                                        <input type="number" name="interest_rate" placeholder="Interest Rate">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-calendar-alt"></i>
                                        <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Monthly">Monthly</option>
                                                <option value="1">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="similar-content">
                <div class="title">
                    <h4>Similar Properties</h4>
                </div>
                <div class="row clearfix">
                    @foreach ($relatedpoperty as $property)
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <img src="{{ asset($property->thumbnail) }}"
                                                style="height: 250px;object-fit:cover;" alt="">
                                        </figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                        <span class="category">{{ $property->propertycategory->category_name }}</span>
                                    </div>
                                    <div class="lower-content">
                                        <div class="author-info clearfix">
                                            <div class="author pull-left">
                                                <figure class="author-thumb">
                                                    <img src="{{ isset($property->users->photo) ? asset($property->users->photo) : Avatar::create($property->users->name)->toBase64() }}"
                                                        style="height: 40px;width:40px;object-fit:cover;" alt="">
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
                                            <h4>
                                                <a href="{{ route('property.details', $property->property_slug) }}">{{ Str::words($property->property_name, '6', ' ') }}
                                                </a>

                                            </h4>
                                        </div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Start From</h6>
                                                @if ($property->discount_price)
                                                    <h4>${{ $property->discount_price }}</h4>
                                                    <h4 class=" text-secondary"><del>${{ $property->price }}</del></h4>
                                                @else
                                                    <h4>${{ $property->price }}</h4>
                                                    <br>
                                                @endif
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                <li><a type="button" id="{{ $property->id }}" onclick="addToWishlist(this.id)"><i class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                        <p> {!! Str::words(strip_tags($property->property_descriptions), '8', '...') !!}</p>
                                        <ul class="more-details clearfix">
                                            <li><i class="icon-14"></i>{{ $property->bedroom }} Beds</li>
                                            <li><i class="icon-15"></i>{{ $property->bath_rooms }} Baths</li>
                                            <li><i class="icon-16"></i>{{ $property->property_size }}</li>
                                        </ul>
                                        <div class="btn-box"><a
                                                href="{{ route('property.details', $property->property_slug) }}"
                                                class="theme-btn btn-two">See
                                                Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- property-details end -->


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
