@extends('layouts.main')

@section('content')
  <div class="fill-container">
    <div class="template-container">
      <div class="result-container">
        <h1 id='statusText'>Order Cancelled!</h1>
        <p class='order-details'>
          Something went wrong.
          <br>
          <b>NOTE:</b> We will not be fulfilling this order.
          <br><br>
          If your card was still charged or you believe this is a mistake please e-mail us at:
          <br>
          <a href="mailto:{{$_ENV['SUPPORT_EMAIL']}}"> Support Email</a>
          <br><br>
          <a href='/' class="btn btn-primary"> HOME </a>
        </p>
      </div>

    </div>
  </div>
@endsection
