<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @include('partials.styles')
    @stack('css-styles')
</head>

<body>
<div class="page-container">
    <!-- sidebar menu End -->
    @include('partials.nav_menu')
    <!-- sidebar menu End -->
    <div class="main-content">
        <!-- header area start -->
        @include('partials.header')
        <!-- header area end -->
        <!-- main content area start -->
        @yield('content')
        <!-- main content area start -->

    </div>
</div>
@include('partials.footer')
@include('partials.scripts')
@yield('scripts')
</body>
</html>
