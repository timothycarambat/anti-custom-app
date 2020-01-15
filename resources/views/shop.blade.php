@extends('layouts.main')

@section('content')
  @include('products')
  <div class="fill-container">
    <div class="template-container">
      <div class="shop-container">
        <h1 id='statusText'>Custom Merch</h1>
      </div>

      <div class="checkout-container">
        <p>
          By purchasing on this website you agree to our <a href='/privacy'> PRIVACY POLICY</a>. You also understand that we utilize <a href='https://stripe.com/legal'>STRIPE</a> as our payment processor.
          This only data collected is data relevant to delivering your order. Your order information will never be used or sold to any third party in any method aside from fulfilling your order.
          <br><br>
          After order confirmation your customer information can be requested to be deleted at your discretion by <a href="mailto:{{$_ENV['SUPPORT_EMAIL']}}">CONTACTING US DIRECTLY.</a>
        </P>
        <button class="btn btn-primary pull-right proceed-to-checkout">
          <i class='fa fa-shopping-cart'></i> Proceed To Checkout
        </button>
      </div>


    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="shirt" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-center" id="exampleModalLabel">Classic T-Shirt</h5>
      </div>
      <div class="modal-body">
        <b>Description</b>
        <br><br>
        This shirt is a Gildan 2000 Classic T-Shirt.
        It has a classic fit, and is made from thicker, pre-shrunk fabric, so the shirt maintains its shape even after being washed.
        <br><br>
        <ul>
          <li>100% cotton</li>
          <li>Ash is 99% cotton, 1% polyester</li>
          <li>Sport Grey is 90% cotton, 10% polyester</li>
          <li>Fabric weight: 6.0 oz/y<sup>2</sup> (203.4 g/m<sup>2</sup>)</li>
          <li>Pre-shrunk</li>
          <li>Shoulder-to-shoulder taping</li>
          <li>Seamless double-needle 7⁄8" (2.2 cm) collar</li>
          <li>Double-needle stitched sleeves and bottom hem</li>
          <li>Quarter-turned to avoid crease down the middle</li>
        </ul>

        This product is made on demand. No minimums.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="hoodie" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h2 class="modal-title text-center" id="exampleModalLabel">Classic Kangaoo Hoodie</h5>
    </div>
    <div class="modal-body">
      <b>Description</b>
      <br><br>
      With a large front pouch pocket and drawstrings in a matching color, this Gildan 185000 Unisex Hoodie is a sure crowd-favorite.
      It’s soft, stylish, and perfect for the cooler evenings.
      <br><br>
      <ul>
        <li>50% pre-shrunk cotton, 50% polyester</li>
        <li>Fabric weight: 8.0 oz/yd<sup>2</sup> (271.25 g/m<sup>2</sup>)</li>
        <li>Double-lined hood with matching drawcord</li>
        <li>Quarter-turned to avoid crease down the middle</li>
        <li>Air-jet spun yarn with a soft feel and reduced pilling</li>
        <li>1x1 athletic rib-knit cuffs and waistband with spandex</li>
        <li>Double-needle stitched collar, shoulders, armholes, cuffs, and hem</li>
        <li>Front pouch pocket</li>
      </ul>
      This product is made on demand. No minimums.
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>


@endsection
