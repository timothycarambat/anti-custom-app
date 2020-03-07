@extends('layouts.main')

@section('content')
  <div class="fill-container">
    <div class="template-container">
      <div class="result-container">
        <h1 id='statusText'>Here is your custom logo!</h1>
        <p>Is the result whack? This isnt a perfect science. <a href='/'>Try it again.</a></p>
        <img src="{{$link}}" class="logo" alt="EXAMPLE custom ASSC Logo!">
      </div>

      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- Horizontal -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-2466331850146937"
           data-ad-slot="3195141144"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>


      <a href="{{$link}}" target="_blank" rel="noreferrer nofollow" class="btn btn-download">
        <i class='fa fa-cloud-download'></i>
        Download Logo
      </a>
      <br>
      <a href="/shop/{{$filename}}" class="btn btn-shop">
        <i class='fa fa-shirtsinbulk'></i>
        Shop Custom Merch
      </a>

      <p>
        Like the result? This generator costs hella money!
        <br>
        <b>VENMO: </b>@tim-carambat
      </p>
    </div>
  </div>
@endsection
