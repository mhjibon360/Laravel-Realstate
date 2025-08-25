@php
     $allagents =App\Models\User::where('status', 1)->where('role', 'agent')->latest()->get();
@endphp
 <section class="team-section sec-pad centred bg-color-1">
     <div class="pattern-layer" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-1.png);">
     </div>
     <div class="auto-container">
         <div class="sec-title">
             <h5>Our Agents</h5>
             <h2>Meet Our Excellent Agents</h2>
         </div>
         <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
             @foreach ($allagents as $agent)
                 <div class="team-block-one">
                     <div class="inner-box">
                         <figure class="image-box">
                             <img src="{{ isset($agent->photo) ? asset($agent->photo) : Avatar::create($agent->name)->toBase64() }}"
                                 style="height: 370px;width:370px;object-fit:cover;" alt="">
                         </figure>
                         <div class="lower-content">
                             <div class="inner">
                                 <h4><a href="{{ route('agent.details', ['id' => $agent->id, 'username' => $agent->username]) }}">{{ $agent->name }}</a></h4>
                                 <span class="designation">{{ $agent->profession }}</span>
                                 <ul class="social-links clearfix">
                                     <li><a href="{{ $agent->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                     <li><a href="{{ $agent->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                     <li><a href="{{ $agent->google }}"><i class="fab fa-google-plus-g"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
