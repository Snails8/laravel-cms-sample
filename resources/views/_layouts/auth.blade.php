<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
<body>
<div id="app">
  <nav class="nav-top fixed-top flex-column">
    <div class="navbar navbar-dark bg-dark p-0 flex-row flex-nowrap">
      <span class="h6 navbar nav-link text-white m-0 py-3">{{ config('app.name', 'Laravel') }}
    </div>
  </nav>
  <main class="mt-5 py-5">
    @yield('content')
  </main>
</div>
</body>
</html>
