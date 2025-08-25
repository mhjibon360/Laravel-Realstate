@extends('frontend.layouts.frontend-master')
@section('title', 'about us')
@section('main')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset($banner->image) }});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>About Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- about-section -->
    @include('frontend.layouts.partials.about.about-section')
    <!-- about-section end -->


    <!-- feature-style-three -->
    @include('frontend.layouts.partials.about.about-services')
    <!-- feature-style-three end -->



    <!-- testimonial-style-four -->
    @include('frontend.layouts.partials.global.testimonial')
    <!-- testimonial-style-four end -->


    <!-- team-section -->
    @include('frontend.layouts.partials.global.team')
    <!-- team-section end -->


    <!-- download-section -->
    @include('frontend.layouts.partials.global.download')
    <!-- download-section end -->
@endsection
