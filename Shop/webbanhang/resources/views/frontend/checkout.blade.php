@extends('layouts.master')
@section('main-content')
<!-- inner page section -->
  <section class="inner_page_head">
     <div class="container_fuild">
        <div class="row">
           <div class="col-md-12">
              <div class="full">
                 <h3>Thanh Toán</h3>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- end inner page section -->

<!-- product section -->
<section class="product_section layout_padding">
 <div class="container">
    <div class="row">
    	<div class="col-md-5">
           <form method="post" action="{{ route('frontend.complete') }}" id="MyForm">
              <fieldset>
                  {{ csrf_field() }}
                  <input type="text" placeholder="Enter your full name" name="fullname" required />
                  <input type="email" placeholder="Enter your email address" name="email" required />
                  <input type="tel" placeholder="Enter your phone number" name="phone_number" required />
                  <input type="text" placeholder="Enter Address" name="address" required />
                  <textarea placeholder="Enter your message" name="note" required></textarea>
                  <button id="submitData" hidden>Send</button>
               </fieldset>
           </form>
      </div>
      <div class="col-md-7">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Tên Sản Phẩm</th>
                  <th>Giá</th>
                  <th>Số Lượng</th>
                  <th>Tổng Tiền</th>
               </tr>
            </thead>
            <tbody>
               @php
                  $total = 0;
               @endphp
               @foreach($cartItems as $item)
                  @php
                     $total += $item->num * $item->discount;
                  @endphp
                  <tr>
                     <td>{{ $item->title }}</td>
                     <td> {{ number_format($item->discount, 0) }}</td>
                     <td> {{ number_format($item->num, 0) }}</td>
                     <td> {{ number_format($item->num * $item->discount, 0) }}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
         <div class="row">
            <div class="col-md-12">
               <h3 style="float: right;font-size: 22px;">Tổng Tiền : {{ number_format($total, 0) }}</h3>
            </div>
            <div class="col-md-12">
               <button onclick="$('#submitData').click()" class="btn btn-success" style="font-size:32px;width: 260px;float: right;">
               Hoàn Thành
               </button>
            </div>
         </div>
      </div>
      
    </div>
 </div>
</section>
<!-- end product section -->
@stop

