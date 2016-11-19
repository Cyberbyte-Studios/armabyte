<!DOCTYPE html>
<html>
<head>
    @include('templates.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('templates.header')
    @include('templates.life-sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                @yield('content')
            </div>
        </section>
    </div>

    @include('templates.footer')

    @include('templates.right-sidebar')

    <div class="control-sidebar-bg"></div>
</div>


<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
