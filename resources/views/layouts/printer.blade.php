<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Any Printer</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{asset('assets/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('assets/css/style-metronic.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/blue.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet" type="text/css"/>
{{--    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>--}}

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet')}}" type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/tasks.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <!-- END THEME STYLES -->
    <!-- BEGIN METRO5 STYLES -->
    <link href="{{asset('assets/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
{{--    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>--}}
    <!-- END METRO5 STYLES -->
    <!-- BEGIN MONITOR PRINTER SIDEBAR STYLES -->
    <link href="{{asset('assets/css/style-thumbs-sidebar.css')}}" rel="stylesheet" type="text/css"/>
{{--    <link href="{{asset('assets/css/ospb.css')}}" rel="stylesheet" type="text/css"/>--}}
    <!-- END MONITOR PRINTER SIDEBAR STYLES -->
{{--    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="icon" sizes="64x64" href="{{asset('assets/img/favicon.png?v=20200417')}}">
    @yield('add_style')
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container" style="padding-top: 20px;">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs margin-bottom-20">
        <div class="container">
            <div class="col-md-4 col-sm-4">
                <img src="{{asset('assets/img/logo.png')}}" style="width: 50%;"/>
            </div>
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Delete Printer</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Are you going to delete this printer?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn default" data-dismiss="modal" aria-hidden="true" id="conf-no">No</button>
                            <button data-dismiss="modal" class="btn blue" id="conf-yes">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
        </div>
    </div>

    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->
    <div class="container min-height">

        <!-- ROW 1 -->
        <div class="row margin-bottom-40">

            <div class="col-md-12 ">
                <!-- BLOCK START -->
                <div class="panel panel-primary">
                    @yield('content')
                </div>
                <!-- BLOCK END -->
            </div>
        </div>
        <!-- END ROW 1 -->

    </div>
    <!-- END CONTAINER -->

</div>
<!-- END PAGE CONTAINER -->
<div class="modal"><!-- Place at bottom of page --></div>
<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
    <script src="{{asset('assets/plugins/respond.min.js')}}"></script>
    <![endif]-->
<script src="{{asset('assets/plugins/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/plugins/hover-dropdown.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>--}}
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="{{asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('assets/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/scripts/ui-general.js')}}"></script>
<!-- END PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) -->

<!-- BEGIN FOR SCROLLBAR -->
{{--<script src="{{asset('assets/scripts/scripts.bundle.js')}}" type="text/javascript" ></script>--}}
{{--<script src="{{asset('assets/scripts/perfect-scrollbar.js')}}" type="text/javascript" ></script>--}}
<script src="{{asset('assets/scripts/sly.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/scripts/scroll_bar.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/scripts/plugins.js')}}" type="text/javascript" ></script>

<!-- END FOR SCROLLBAR -->
<script>
    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");},
        ajaxStop: function() { $body.removeClass("loading"); }
    });
</script>
@yield('script')
{{--<script src="{{asset('assets/scripts/app.js')}}"></script>--}}

<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
