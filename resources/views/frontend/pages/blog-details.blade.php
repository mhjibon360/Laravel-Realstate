@extends('frontend.layouts.frontend-master')
@section('title', 'blog details')
@section('main')
    <!--Page Title-->
    <section class="page-title centred"
        style="background-image: url({{ asset('frontend') }}/assets/images/background/page-title-5.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Blog Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <img src="{{ asset($news->thumbnail) }}" alt="">
                                    </figure>
                                    <span class="category">{{ $news->blogcategory->category_name }}</span>
                                </div>
                                <div class="lower-content">
                                    <h3>{!! Str::words($news->title, '6', ' ') !!}</h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb">
                                                <img src="{{ isset($news->users->photo) ? asset($news->users->photo) : Avatar::create($news->users->name)->toBase64() }}"
                                                    style="height:40px;width:40px;object-fit:cover;" alt="">
                                            </figure>
                                            <h5><a href="blog-details.html">{{ $news->users->name }}</a></h5>
                                        </li>
                                        <li>{{ $news->created_at->format('F d,Y') }}</li>
                                    </ul>
                                    <div class="text">
                                        {!! $news->details !!}
                                    </div>
                                    <div class="post-tags">
                                        <ul class="tags-list clearfix">
                                            <li>
                                                <h5>Tags:</h5>
                                            </li>
                                            @foreach ($news->blogtags as $tag)
                                                <li>
                                                    <a
                                                        href="{{ route('tag.news', $tag->tag_slug) }}">{{ $tag->tag_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget search-widget">
                            <div class="widget-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-inner">
                                <form action="{{ route('search.news') }}" method="get">
                                    @csrf
                                    @method('GET')
                                    <div class="form-group">
                                        <input type="search" name="filter[title]" placeholder="Search" required="">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @php
                            $url = urlencode(route('news.details', $news->slug)); // news er URL
                            $title = urlencode($news->title); // news er title
                        @endphp

                        <div class="sidebar-widget social-widget">
                            <div class="widget-title">
                                <h4>Follow Us On</h4>
                            </div>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>

                                <li>
                                    <a
                                        href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}"><i
                                            class="fab fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Category</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($blogcategory as $bcategory)
                                        @php
                                            $bcount = App\Models\BlogPost::where('category_id', $bcategory->id)->get();
                                        @endphp
                                        <li>
                                            <a href="{{ route('category.news', $bcategory->category_slug) }}">{{ $bcategory->category_name }}
                                                <span>({{ count($bcount) }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>Recent Posts</h4>
                            </div>
                            <div class="post-inner">
                                @foreach ($recentnews as $rnews)
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="{{ route('news.details', $rnews->slug) }}">
                                                <img src="{{ asset($rnews->thumbnail) }}"
                                                    style="height: 80px;width:80px;object-fit:cover;" alt="">
                                            </a>
                                        </figure>
                                        <h5><a href="{{ route('news.details', $rnews->slug) }}">{!! Str::words($rnews->title, '6', ' ') !!}</a>
                                        </h5>
                                        <span class="post-date">{{ $rnews->created_at->diffForHumans() }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->

    <!-- subscribe-section -->
    <section class="subscribe-section bg-color-3">
        <div class="pattern-layer" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-2.png);">
        </div>
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
