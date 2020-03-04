<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Create your own custom Anti Social Social Club logo with our logo generation tool. Download the logo for Free and get merch your custom logo on it!">
    <meta name="keywords" content="antisocialsocialclub, anti social, anti social social club, streetwear, hypebeast, ASSC, logo generator, street style, logo, generator, custom logo, custom, custom logo generator, custom anti social social club logo, custom streetwear logo, custom ASSC hoodie, custom ASSC shirt, custom ASSC logo, Anti Club, Anti Club logo generator">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="30 days">
    <meta name="author" content="Timothy Carambat">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/imgs/example.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('gascript')
    @include('gaads')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('header')
    <!-- Page Content -->
    @yield('content')
    <!-- /#page-content-wrapper -->

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
      // Set Globals Here
      window.env = "{{$_ENV['APP_ENV']}}"
      window.page = "{{$page}}"
      window.stripe = Stripe("{{$_ENV['STRIPE_PUB_KEY']}}")
      window._token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
