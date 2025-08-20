@extends('frontend.layouts.frontend-master')
@section('title', 'home')
@section('main')
    <!-- banner-section -->
    @include('frontend.layouts.partials.home.banner')
    <!-- banner-section end -->


    <!-- category-section -->
    @include('frontend.layouts.partials.home.property-category')
    <!-- category-section end -->


    <!-- feature-section -->
    @include('frontend.layouts.partials.home.featured')
    <!-- feature-section end -->


    <!-- video-section -->
    @include('frontend.layouts.partials.home.video')
    <!-- video-section end -->


    <!-- deals-section -->
    @include('frontend.layouts.partials.home.deals')
    <!-- deals-section end -->


    <!-- testimonial-section end -->
    @include('frontend.layouts.partials.home.testimonial')
    <!-- testimonial-section end -->


    <!-- chooseus-section -->
    @include('frontend.layouts.partials.home.chooseus')
    <!-- chooseus-section end -->


    <!-- place-section -->
    @include('frontend.layouts.partials.home.place')
    <!-- place-section end -->


    <!-- team-section -->
    @include('frontend.layouts.partials.home.team')
    <!-- team-section end -->


    <!-- cta-section -->
    @include('frontend.layouts.partials.home.cta')
    <!-- cta-section end -->


    <!-- news-section -->
    @include('frontend.layouts.partials.home.news')
    <!-- news-section end -->


    <!-- download-section -->
    @include('frontend.layouts.partials.home.download')
    <!-- download-section end -->

@endsection
