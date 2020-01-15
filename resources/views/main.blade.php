@extends('layouts.main')

@section('content')
  <div class="fill-container">
    <div class="template-container">
      @include('template')
      <form action="/generate_logo" method="post" autocomplete="off">
        {{csrf_field()}}
        <div class="input-container">
            <input id="socialTag1" class="form-control social-input"
              name="socialTag1"
              type="text"
              placeholder="Something"
              title="Your Word Here (10 Character Limit)"
              oninvalid="this.setCustomValidity('Field Must be filled. Limit of 10 Characters. The word \'SOCIAL\' is not permitted.')"
              oninput="setCustomValidity('')"
              maxlength="10"
              required
            />
            <input id="socialTag2" class="form-control social-input"
              name="socialTag2"
              type="text"
              placeholder="Something"
              title="Your Word Here (10 Character Limit)"
              oninvalid="this.setCustomValidity('Field Must be filled. Limit of 10 Characters. The word \'SOCIAL\' is not permitted.')"
              oninput="setCustomValidity('')"
              maxlength="10"
              required
            />
        </div>

        <div class="form-group color-picker-container">
            <label class="control-label">Choose Logo Color:</label>
            <p>*Background will be transparent</p>
            <input id="logoColor" name='color' class='form-control color-picker' type="color" value="#000000">
        </div>

        <p class="alert alert-danger hidden">You cannot use the word "SOCIAL" as either of your tags.</p>

        <button type='submit' class="btn btn-generate">
          Generate Logo
        </button>

    </form>



    </div>

  </div>
@endsection
