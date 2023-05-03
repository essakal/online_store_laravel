<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- @include('layouts.dashboard.components.head') --}}
    @yield('head')
</head>

<body class="font-sans antialiased">
    @yield('body')
</body>

</html>
