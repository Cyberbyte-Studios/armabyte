<!DOCTYPE html>
<html>
<head>
    @include('templates.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('templates.header')
    @include('templates.life-sidebar')

    <div class="content-wrapper" id="app">
        @yield('content')
    </div>

    @include('templates.footer')

    @include('templates.right-sidebar')

    <div class="control-sidebar-bg"></div>
</div>

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
