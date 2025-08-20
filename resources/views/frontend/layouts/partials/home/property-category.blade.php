 <section class="category-section centred">
     <div class="auto-container">
         <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
             <ul class="category-list clearfix">
                 @foreach ($propertycatgorys as $pcategory)
                     @php
                         $pcount = App\Models\Property::where('category_id', $pcategory->id)->get();
                     @endphp
                     <li>
                         <div class="category-block-one">
                             <div class="inner-box">
                                 <div class="icon-box"><i class="{{ $pcategory->category_icon }}"></i></div>
                                 <h5>
                                     <a
                                         href="{{ route('category.wise.property', $pcategory->category_slug) }}">{{ $pcategory->category_name }}</a>
                                 </h5>
                                 <span>{{ count($pcount) }}</span>
                             </div>
                         </div>
                     </li>
                 @endforeach
             </ul>
             <div class="more-btn"><a href="{{ route('property.category') }}" class="theme-btn btn-one">All
                     Categories</a>
             </div>
         </div>
     </div>
 </section>
