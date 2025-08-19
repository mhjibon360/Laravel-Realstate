 <section class="chooseus-section">
     <div class="auto-container">
         <div class="inner-container bg-color-2">
             <div class="upper-box clearfix">
                 <div class="sec-title light">
                     <h5>Why Choose Us?</h5>
                     <h2>Reasons To Choose Us</h2>
                 </div>
                 <div class="btn-box">
                     <a href="categories.html" class="theme-btn btn-one">All Categories</a>
                 </div>
             </div>
             <div class="lower-box">
                 <div class="row clearfix">
                     @foreach ($chooseusall as $choose)
                         <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                             <div class="chooseus-block-one">
                                 <div class="inner-box">
                                     <div class="icon-box"><i class="{{ $choose->icon }}"></i></div>
                                     <h4>{{ $choose->title }}</h4>
                                     <p>{{ $choose->details }}</p>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </section>
