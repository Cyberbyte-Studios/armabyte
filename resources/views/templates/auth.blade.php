<!DOCTYPE html>
<html>
<head>
    @include('templates.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="https://cyberworks.org.uk"><b>Arma</b>byte</a>
    </div>

    @yield('content')
</div>

<script src="{{ elixir('js/app.js') }}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
</body>
</html>
