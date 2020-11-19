<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Any3dPrinter</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('assets/css/style-metronic.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.css?v=20200929')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('assets/css/custom.css?v=202004210948')}}" rel="stylesheet" type="text/css"/>

    <link rel="icon" sizes="64x64" href="{{asset('assets/img/favicon.png?v=20200417')}}">
    @yield('add_style')
    <!-- END THEME STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
</head>
<body>
<div class="page-container">
    <!-- BEGIN BREADCRUMBS -->
    <div class="logo margin-bottom-20">
        <div class="container">
            <div class="col-md-4 col-sm-4">
                <img src="{{asset('assets/img/logo.png')}}" style="width: 50%;"/>
            </div>
        </div>
    </div>

    <!-- END BREADCRUMBS -->

    @yield('content')

</div>
<div class="modal"><!-- Place at bottom of page --></div>
<script src="{{asset('assets/plugins/jquery-1.10.2.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>
<script>
    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");},
        ajaxStop: function() { $body.removeClass("loading"); }
    });
</script>
@yield('add_script')
</body>
</html>
