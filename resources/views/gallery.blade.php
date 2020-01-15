@extends('layouts.main')

@section('content')
  <div class="fill-container">
    <div class="template-container">
      <div class="gallery-container">
        <h1 id='statusText'>Logo Gallery</h1>

        <div class="row">
          @foreach($logos as $data)
            <div class="col-md-3 col-xs-12">
              <img class='col-xs-12 show-logo' src="{{$data['link']}}" />
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
