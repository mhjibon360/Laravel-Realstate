@php
    $dealproperty = App\Models\Property::where('status', 1)->where('hot_property', 1)->latest()->take(3)->get();
@endphp
<section class="deals-section sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Hot Property</h5>
            <h2>Our Best Deals</h2>
        </div>

        <div class="row clearfix">
            @foreach ($dealproperty as $property)
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
                                            <a href="{{ route('property.details', $property->property_slug) }}">For Buy</a>
                                        @else
                                            <a href="{{ route('property.details', $property->property_slug) }}">For Rent</a>
                                        @endif
                                    </div>
                                </div>
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
                                            <h4 class=" text-secondary"><del>${{ $property->price }}</del></h4>
                                        @else
                                            <h4>${{ $property->price }}</h4>
                                            <br>
                                        @endif
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a type="button" id="{{ $property->id }}"
                                                onclick="addTocompare(this.id)"><i class="icon-12"></i></a></li>
                                        <li><a type="button" id="{{ $property->id }}"
                                                onclick="addToWishlist(this.id)"><i class="icon-13"></i></a></li>
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
</section>
