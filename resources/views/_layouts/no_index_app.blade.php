<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex">
  <meta name="description" content="@yield('description')" />
  <title>@yield('title') @if(Route::currentRouteName() != 'top') @endif</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
  <script src="https://kit.fontawesome.com/e913ec5f83.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/app.js') }}"></script>
  <link href="https://fonts.googleapis.com/css?family=Alata" rel="stylesheet">
</head>

<body>
<div id="app">
  @include('_partials.nav')
  <div class="front container-fluid p-0">
    <main role="main" class="main-box">
      <div class="content-box container-fluid d-flex justify-content-center">
        @yield('content')
      </div>
    </main>
  </div>
{{--  <footer class="pt-4 my-md-5 pt-md-5 border-top">--}}
    {{--  @include('_components.menu-box')--}}
{{--  </footer>--}}
</div>

{{--</div>--}}
{{--@include('_components.header')--}}
{{--<main id="app">@yield('content')</main>--}}

</body>
</html>