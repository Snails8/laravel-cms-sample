<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('/css/app_admin.css') }}" rel="stylesheet">
  <script src="{{ asset('/js/app_admin.js') }}" defer></script>
</head>
<body>
<div id="app">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="row container-fluid pe-0">
      <div class="col-md-auto me-auto nav">
        <div class="navbar-brand nav-item">
          {{ config('app.name', 'Act') }}
        </div>
      </div>
    </div>
  </nav>



  <main class="mt-5 py-5">
    @yield('content')
  </main>
</div>
</body>
</html>
