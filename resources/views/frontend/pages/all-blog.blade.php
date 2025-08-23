@extends('frontend.layouts.frontend-master')
@section('title', 'all news')
@section('main')
    <!--Page Title-->
    <section class="page-title centred"
        style="background-image: url({{ asset('frontend') }}/assets/images/background/page-title-5.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>news</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>news</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="blog-list sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($allblognews as $news)
                    <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                        <div class="news-block-two wow fadeInLeft animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box align-items-center">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('news.details', $news->slug) }}">
                                            <img src="{{ asset($news->thumbnail) }}" style="height: 370px;object-fit:cover;"
                                                alt="">
                                        </a>
                                    </figure>
                                    <a href="{{ route('news.details', $news->slug) }}"
                                        class="feature">{{ $news->blogcategory->category_name }}</a>
                                </div>
                                <div class="content-box">
                                    <h4><a href="{{ route('news.details', $news->slug) }}">{!! Str::words($news->title, '6', ' ') !!}</a></h4>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb">
                                                <img src="{{ isset($news->users->photo) ? asset($news->users->photo) : Avatar::create($news->users->name)->toBase64() }}"
                                                    style="height: 40px; width: 40px; object-fit: cover" alt="">
                                            </figure>
                                            <h5>
                                                <a
                                                    href="{{ route('news.details', $news->slug) }}">{{ $news->users->name }}</a>
                                            </h5>
                                        </li>
                                        <li>{{ $news->created_at->format('F d,Y') }}</li>
                                    </ul>
                                    <p>{!! Str::limit(strip_tags($news->details), '65', ' ') !!}</p>
                                    <div class="btn-box">
                                        <a href="{{ route('news.details', $news->slug) }}" class="theme-btn btn-two">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {!! $allblognews->links('pagination::my-pagination') !!}
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->

@endsection
