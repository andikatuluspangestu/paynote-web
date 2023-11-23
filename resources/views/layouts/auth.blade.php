<!DOCTYPE html>
<html>

<head>
  <title> Masuk atau Daftar - {{ config('app.name') }}</title>
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  @yield('content')

  <!-- Javascript Vendor -->
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>
</body>

</html>