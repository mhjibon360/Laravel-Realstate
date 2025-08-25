@php
    $chooseusall = App\Models\ChooseUs::all();
@endphp
<section class="feature-style-three centred pb-110">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Services</h5>
            <h2>Property Services</h2>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
            @foreach ($chooseusall as $choose)
                <div class="feature-block-two">
                    <div class="inner-box">
                        <div class="icon-box"><i class="{{ $choose->icon }}"></i></div>
                        <h4>{{ $choose->title }}</h4>
                        <p>{{ $choose->details }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
