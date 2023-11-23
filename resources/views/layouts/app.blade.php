<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'PayNote')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
</head>

<body id="page-top">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')
</body>

</html>