@extends('layouts.main')

@section('content')
  <div class="fill-container">
    <div class="template-container">
      <div class="gallery-container">
        <h1 id='statusText'>Logo Gallery</h1>

        <div class="row">
          @php
            $i = 0;
          @endphp
          @foreach($logos as $data)
            @if($i % 10 == 0)
              <div class="col-md-3 col-xs-12" style="min-height:480px">
                  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- Square Display -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-2466331850146937"
                       data-ad-slot="4791842582"
                       data-ad-format="auto"
                       data-full-width-responsive="true"></ins>
                  <script>
                       (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
              </div>
            @endif
            @php
              $i++;
            @endphp

            <div class="col-md-3 col-xs-12" style="min-height:480px">
              <img alt='User generated custom ASSC logo' class='col-xs-12 show-logo' src="{{$data['link']}}" />
              <a href="{{$data['link']}}" target="_blank" rel="noreferrer nofollow" class="btn btn-download gallery">
                <i class='fa fa-cloud-download'></i>
                Download Logo
              </a>
              <br>
              <a href="/shop/{{$data['filename']}}" class="btn btn-shop gallery">
                <i class='fa fa-shirtsinbulk'></i>
                Shop Custom Merch
              </a>
            </div>
          @endforeach
        </div>

      </div>

    </div>
  </div>
@endsection
