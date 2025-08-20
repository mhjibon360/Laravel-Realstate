@php
    $featuredcategory = App\Models\Property::where('status', 1)
        ->where('featured_property', 1)
        ->latest()
        ->take(3)
        ->get();
@endphp
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Features</h5>
            <h2>Featured Property</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">

            @foreach ($featuredcategory as $property)
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{ asset($property->thumbnail) }}" style="height: 250px;object-fit:cover;"
                                        alt="">
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
                                        <li><a href="property-details.html"><i class="icon-13"></i></a></li>
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
        <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All
                Listing</a></div>
    </div>
</section>
