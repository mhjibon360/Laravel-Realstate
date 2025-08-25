@php
    $seosetting = App\Models\SeoSetting::first();
@endphp
 <section class="about-section about-page pb-0">
     <div class="auto-container">
         <div class="inner-container">
             <div class="row align-items-center clearfix">
                 <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                     <div class="image_block_2">
                         <div class="image-box">
                             <figure class="image"><img src="{{ asset('frontend') }}/assets/images/resource/about-1.jpg"
                                     alt="">
                             </figure>
                             <div class="text wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                 <h2>20</h2>
                                 <h4>Years of <br />Experience</h4>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                     <div class="content_block_3">
                         <div class="content-box">
                             <div class="sec-title">
                                 <h5>About</h5>
                                 <h2>Hi, {!! $seosetting->author_name !!}</h2>
                             </div>
                             <div class="text">
                                 <p>{!! $seosetting->author_details !!}</p>
                             </div>
                             <div class="btn-box">
                                 <a href="{{ route('contact.us') }}" class="theme-btn btn-one">Contact With Me</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
