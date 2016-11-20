<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>CyberWorks | Blank Page</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="{{ elixir('css/plugins.css') }}">
<link rel="stylesheet" href="{{ elixir('css/theme.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
    window.Cyberworks = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]); !!}
</script>