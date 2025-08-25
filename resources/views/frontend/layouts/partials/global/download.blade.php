@php
    $download = App\Models\Download::first();
    $allplatform = App\Models\Platform::all();
@endphp
<section class="download-section bg-color-3">
    <div class="pattern-layer" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-3.png);">
    </div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                <div class="image-box">
                    <figure class="image image-1 wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <img src="{{ asset('frontend') }}/assets/images/resource/download-1.png" alt="">
                    </figure>
                    <figure class="image image-2 wow fadeInUp animated" data-wow-delay="300ms"
                        data-wow-duration="1500ms"><img src="{{ asset($download->frame_image) }}" alt="">
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <span>{{ $download->download_title }}</span>
                        <h2>{{ $download->download_heading }}</h2>
                        <div class="download-btn">
                            @foreach ($allplatform as $platform)
                                <a href="{{ $platform->link }}" target="_blank" class="app-store">
                                    <i class="{{ $platform->icon }}"></i>
                                    <p>{{ $platform->title }}</p>
                                    <h4>{{ $platform->heading }}</h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
