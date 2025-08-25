@php
    $gensetting = App\Models\GeneralSetting::first();
    $topnews = App\Models\BlogPost::where('status', 1)->inRandomOrder()->take(2)->get();
@endphp
<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>About</h3>
                        </div>
                        <div class="text">
                            <p>{!! $gensetting->about_details !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li><a href="{{ route('property.list') }}">Property</a></li>
                                <li><a href="{{ route('our.agent') }}">Agent</a></li>
                                <li><a href="{{ route('all.news') }}">Our Blog</a></li>
                                <li><a href="index.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Top News</h3>
                        </div>
                        <div class="post-inner">

                            @foreach ($topnews as $news)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ route('news.details', $news->slug) }}"><img
                                                src="{{ asset($news->thumbnail) }}" alt=""></a></figure>
                                    <h5><a href="{{ route('news.details', $news->slug) }}">{!! Str::words($news->title, '4', ' ') !!}</a>
                                    </h5>
                                    <p> {{ $news->created_at->format('M d,Y') }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contacts</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $gensetting->address }}</li>
                                <li><i class="fas fa-microphone"></i><a
                                        href="tel:{{ $gensetting->number }}">{{ $gensetting->number }}</a></li>
                                <li><i class="fas fa-envelope"></i><a
                                        href="mailto:{{ $gensetting->gmail }}">{{ $gensetting->gmail }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <figure class="footer-logo"><a href="{{ route('home.index') }}"><img
                            src="{{ asset($gensetting->footer_logo) }}" alt=""></a>
                </figure>
                <div class="copyright pull-left">
                    <p>
                        {!! $gensetting->copyright !!}
                        {{-- <a href="{{ route('home.index') }}">Realshed</a> &copy; 2021 All Right Reserved --}}
                    </p>
                </div>
                <ul class="footer-nav pull-right clearfix">
                    <li><a href="{{ route('home.index') }}">Terms of Service</a></li>
                    <li><a href="{{ route('home.index') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
