@extends('layouts.master')
@section('main-content')
<!-- inner page section -->
  <section class="inner_page_head">
     <div class="container_fuild">
        <div class="row">
           <div class="col-md-12">
              <div class="full">
                 <h3>Liên Hệ</h3>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- end inner page section -->



<!-- why section -->
<section class="why_section layout_padding">
   <div class="container">
   
      <div class="row">
         <div class="col-lg-8 offset-lg-2">
            <div class="full">
               <form action="{{ route('frontend.contact.send') }}" method="post">
                  <fieldset>
                     {{ csrf_field() }}
                     <input type="text" placeholder="Enter your full name" name="fullname" required />
                     <input type="email" placeholder="Enter your email address" name="email" required />
                     <input type="tel" placeholder="Enter your phone number" name="phone_number" required />
                     <input type="text" placeholder="Enter subject" name="subject_name" required />
                     <textarea placeholder="Enter your message" name="note" required></textarea>
                     <input type="submit" value="Submit" />
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end why section -->
<!-- arrival section -->



<section class="arrival_section">
<div class="container">
   <div class="box">
      <div class="arrival_bg_box">
         <img src="{{ asset('themes/fontend/images/arrival-bg.png') }}" alt="">
      </div>
      <div class="row">
         <div class="col-md-6 ml-auto">
            <div class="heading_container remove_line_bt">
               <h2>
                  #NewArrivals
               </h2>
            </div>
            <p style="margin-top: 20px;margin-bottom: 30px;">
               Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
            </p>
            <a href="{{ route('frontend.products') }}">
            Shop Now
            </a>
         </div>
      </div>
   </div>
</div>
</section>
<!-- end arrival section -->
@stop