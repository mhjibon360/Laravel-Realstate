@extends('frontend.layouts.frontend-master')
@section('title', 'our excellent agents list')
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
                <h1>Our Excellent Agents</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>Agency List View</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->



    <!-- agents-page-section -->
    <section class="agents-page-section agents-list">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar agent-sidebar">
                        <div class="agents-search sidebar-widget">
                            <div class="widget-title">
                                <h5>Find Agent</h5>
                            </div>
                            <div class="search-inner">
                                <form action="agents-list.html">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Enter Agent Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Categories">All Categories</option>
                                                <option value="1">New Arrival</option>
                                                <option value="2">Top Rated</option>
                                                <option value="3">Most Search</option>
                                                <option value="4">Recent Place</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Cities">All Cities</option>
                                                <option value="1">New York</option>
                                                <option value="2">California</option>
                                                <option value="3">London</option>
                                                <option value="4">Maxico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="theme-btn btn-one">Search Agent</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Status Of Property</h5>
                            </div>
                            <ul class="category-list clearfix">
                                <li><a href="agency-details.html">For Rent <span>(200)</span></a></li>
                                <li><a href="agency-details.html">For Sale <span>(700)</span></a></li>
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

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="agency-content-side">
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left">
                                <h5> Results: <span>Showing {{ $allagents->total() }} Agents</span></h5>
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
                        <div class="wrapper list">
                            <div class="agents-list-content list-item">
                                @foreach ($allagents as $agent)
                                    <div class="agents-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="{{ isset($agent->photo) ? asset($agent->photo) : Avatar::create($agent->name)->toBase64() }}
"
                                                    style="height:330px; width:270px; object-fit: cover" alt="">
                                            </figure>
                                            <div class="content-box">
                                                <div class="upper clearfix">
                                                    <div class="title-inner pull-left">
                                                        <h4><a href="{{ route('agent.details', ['id' => $agent->id, 'username' => $agent->username]) }}">{{ $agent->name }}</a></h4>
                                                        <span class="designation">{{ $agent->profession }}</span>
                                                    </div>
                                                    <ul class="social-list pull-right clearfix">
                                                        <li><a href="{{ $agent->facebook }}"><i
                                                                    class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li><a href="{{ $agent->twitter }}"><i
                                                                    class="fab fa-twitter"></i></a>
                                                        </li>
                                                        <li><a href="{{ $agent->google }}"><i
                                                                    class="fab fa-linkedin-in"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text">
                                                    <p>{!! Str::limit($agent->details, '150', '...') !!}</p>
                                                </div>
                                                <ul class="info clearfix">
                                                    <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:{{ $agent->email }}">{{ $agent->email }}</a>
                                                    </li>
                                                    <li><i class="fab fa fa-phone"></i><a
                                                            href="tel:{{ $agent->phone }}">{{ $agent->phone }}</a></li>
                                                </ul>
                                                <div class="btn-box">
                                                    <a href="{{ route('agent.details', ['id' => $agent->id, 'username' => $agent->username]) }}"
                                                        class="theme-btn btn-two">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="agents-grid-content">
                                <div class="row clearfix">
                                    @foreach ($allagents as $agent)
                                        <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                            <div class="agents-block-two">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="{{ isset($agent->photo) ? asset($agent->photo) : Avatar::create($agent->name)->toBase64() }}"
                                                            style="height:160px; width:160px; object-fit: cover"
                                                            alt="">
                                                    </figure>
                                                    <div class="content-box">
                                                        <div class="title-inner">
                                                            <h4><a
                                                                    href="{{ route('agent.details', ['id' => $agent->id, 'username' => $agent->username]) }}">{{ $agent->name }}</a>
                                                            </h4>
                                                            <span class="designation">{{ $agent->profession }}</span>
                                                        </div>
                                                        <div class="text">
                                                            <p>{!! Str::limit($agent->details, '150', '...') !!}</p>
                                                        </div>
                                                        <ul class="info clearfix">
                                                            <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:{{ $agent->email }}">{{ $agent->email }}</a>
                                                            </li>
                                                            <li><i class="fab fa fa-phone"></i><a
                                                                    href="tel:{{ $agent->phone }}">{{ $agent->phone }}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="btn-box">
                                                            <a href="{{ route('agent.details', ['id' => $agent->id, 'username' => $agent->username]) }}"
                                                                class="theme-btn btn-two">View
                                                                Profile</a>
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
                            {{ $allagents->links('pagination::my-pagination') }}
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
