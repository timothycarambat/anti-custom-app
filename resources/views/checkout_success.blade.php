@extends('layouts.main')

@section('content')
  <div class="fill-container">
    <div class="template-container">
      <div class="result-container">
        <h1 id='statusText'>Order Confirmed!</h1>
        <p class='order-details'>
          We just recieved your order.
          <br>
          <b>NOTE:</b> You Billing address is the address we will be sending the order to. If your billing address is <b>not</b> your shipping address
          <br>
          <a href="mailto:{{$_ENV['SUPPORT_EMAIL']}}"> E-MAIL US IMMEDIATELY</a>
          <br><br>
          We will work on fulfilling your order immediately. You will shortly recieve an order reciept. This is your proof of purchase.
          You will recieve an email when your product is shipped.
          <br>
          It will take about <b>3 Days</b> to ship this out depending on volume.
          <br><br>
          If you have questions about your order, your reciept, or any other comments e-mail us at:
          <br>
          <a href="mailto:{{$_ENV['SUPPORT_EMAIL']}}"> Support Email</a>
          <br><br>
          <a href='/gallery' class="btn btn-primary"> SEE LOGO GALLERY </a>
        </p>
      </div>

    </div>
  </div>
@endsection
