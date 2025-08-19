 <section class="place-section sec-pad">
     <div class="auto-container">
         <div class="sec-title centred">
             <h5>Top Places</h5>
             <h2>Most Popular Places</h2>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                 dolore magna aliqua enim.</p>
         </div>
         <div class="sortable-masonry">
             <div class="items-container row clearfix">
                 @foreach ($allplaces->take(1) as $place)
                     @php
                         $pcount = App\Models\Property::where('location_id', $place->id)->count();
                     @endphp
                     <div
                         class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                         <div class="place-block-one">
                             <div class="inner-box">
                                 <figure class="image-box"><img src="{{ asset($place->location_image) }}" alt="">
                                 </figure>
                                 <div class="text">
                                     <h4><a href="categories.html">{{ $place->location_name }}</a></h4>
                                     <p>{{ $pcount }} Properties</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach

                 @foreach ($allplaces->slice(1, 2) as $place)
                     @php
                         $pcount = App\Models\Property::where('location_id', $place->id)->count();

                     @endphp
                     <div
                         class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                         <div class="place-block-one">
                             <div class="inner-box">
                                 <figure class="image-box"><img src="{{ asset($place->location_image) }}"
                                         alt="">
                                 </figure>
                                 <div class="text">
                                     <h4><a href="categories.html">{{ $place->location_name }}</a></h4>
                                     <p>{{ $pcount }} Properties</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach

                 @foreach ($allplaces->slice(3, 1) as $place)
                     @php
                         $pcount = App\Models\Property::where('location_id', $place->id)->count();

                     @endphp
                     <div
                         class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                         <div class="place-block-one">
                             <div class="inner-box">
                                 <figure class="image-box"><img src="{{ asset($place->location_image) }}"
                                         alt="">
                                 </figure>
                                 <div class="text">
                                     <h4><a href="categories.html">{{ $place->location_name }}</a></h4>
                                     <p>{{ $pcount }} Properties</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
