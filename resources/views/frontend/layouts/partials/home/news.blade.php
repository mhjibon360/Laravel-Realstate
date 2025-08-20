 <section class="news-section sec-pad">
     <div class="auto-container">
         <div class="sec-title centred">
             <h5>News & Article</h5>
             <h2>Stay Update With Realshed</h2>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                 dolore magna aliqua enim.</p>
         </div>
         <div class="row clearfix">
             @foreach ($allnews as $news)
                 <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                     <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                         <div class="inner-box">
                             <div class="image-box">
                                 <figure class="image"><a href="{{ route('news.details', $news->slug) }}">
                                         <img src="{{ asset($news->thumbnail) }}"
                                             style="height: 270px;object-fit:cover;" alt=""></a>
                                 </figure>
                                 <span class="category">{{ $news->blogcategory->category_name }}</span>
                             </div>
                             <div class="lower-content">
                                 <h4><a href="{{ route('news.details', $news->slug) }}">{!! Str::words($news->title, '6', ' ') !!}</a></h4>
                                 <ul class="post-info clearfix">
                                     <li class="author-box">
                                         <figure class="author-thumb">
                                             <img src="{{ isset($news->users->photo) ? asset($news->users->photo) : Avatar::create($news->users->name)->toBase64() }}
"
                                                 style="height:40px;width:40px;object-fit:cover;" alt="">
                                         </figure>
                                         <h5><a
                                                 href="{{ route('news.details', $news->slug) }}">{{ $news->users->name }}</a>
                                         </h5>
                                     </li>

                                     <li style="display: block;width:100%;">{{ $news->created_at->format('F d,Y') }}
                                     </li>
                                 </ul>
                                 <div class="text">
                                     <p>{!! Str::limit(strip_tags($news->details), '65', ' ') !!}</p>
                                 </div>
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
     </div>
 </section>
