<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    @yield('add_meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ '/assets/plugins/fontawesome-free/css/all.min.css'}}">
    <link rel="stylesheet" href="{{ '/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'}}">
    <link rel="stylesheet" href="{{ '/assets/css/docs.css'}}">
    <link rel="stylesheet" href="{{ '/assets/css/highlighter.css'}}">
    <link rel="stylesheet" href="{{ '/assets/css/adminlte.min.css'}}">
    @yield('css')
    @stack('style')
</head>
{{--  {%- include head.html -%}--}}
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
{{--      {%- include navbar.html -%}--}}
        @include('User._includes.navbar')
{{--      {%- include sidebar.html -%}--}}
        @include('User._includes.sidebar')
        <div class="content-wrapper">
        @yield('content')
        </div>
{{--      {%- include footer.html -%}--}}
        @include('User._includes.footer')
    </div>
{{--    {% include foot.html -%}--}}
@include('Admin._includes.foot')
@stack('scripts')
</body>
</html>
