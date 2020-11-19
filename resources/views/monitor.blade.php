@extends('layouts.template')
@section('content')
    <!-- BEGIN CONTAINER -->
    <div class="container min-height">
        <!-- ROW 1 -->
        <div class="row margin-bottom-40">

            <div class="col-md-12 ">
                <!-- BLOCK START -->
                <div class="panel panel-primary">
                    <div class="panel-heading" style="height: 40px; padding-right: 30px;padding-top: 6px;">
                        <span style="font-size: 20px;">{{$user->name}}&nbsp-&nbsp</span>
                        <span id="txtPrinter"></span>
                        <div id="settingPrinter" class="row"
                             style="float: right;cursor:pointer; font-size:18px; line-height: 20px;">
                            . . .
                        </div>
                    </div>

                    <!-- scroll_bar besign -->


                    <!-- scroll_bar end -->

                    <div class="panel-body" style="padding: 0px;">
                        <div class="wrap">
                            <div class="frame" id="basic">
                                <ul class="clearfix" id="printerSidebar">
                                    @foreach($printers as $printer)
                                        <li id="{{$printer->email}}">
                                            @if($printer->property)
                                                @php
                                                    $property = json_decode($printer->property);
                                                @endphp
                                            @endif
                                            <div class="col-xs-12">
                                                <h6 class="col-xs-12 text-center bold m-0" style="padding: 7px;">
                                                    @if($printer->property)
                                                        {{$property->time}}
                                                    @else
                                                        --------
                                                    @endif
                                                </h6>
                                            </div>
                                            <div class="col-xs-12 p-0">
                                                <div class="col-xs-6" style="padding: 0 0 0 5px;">
                                                    <img width="100%" height="60"
                                                         src="@if($printer->type == "OCTOPRINT")
                                                         {{asset('assets/img/printers/octoprint.png')}}
                                                         @else
                                                         {{asset('assets/img/printers/printer1_small.png')}}
                                                         @endif
                                                             "
                                                         style="@if($printer->status != "connected") filter: grayscale(1) @endif">
                                                </div>
                                                <div class="col-xs-6 p-0">
                                                    <div class="side_txt">
                                                        @if($printer->property)
                                                            <p>Heat</p>
                                                            <p>{{$property->hothead}}</p>
                                                            <p>Bed</p>
                                                            <p>{{$property->hotbed}}</p>
                                                            <p>Fila</p>
                                                            <p>{{$property->filament}}</p>
                                                        @else
                                                            <p>Heat</p>
                                                            <p>----</p>
                                                            <p>Bed</p>
                                                            <p>----</p>
                                                            <p>Fila</p>
                                                            <p>----</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="text-center bold m-0"
                                                        style="padding: 5px;">{{substr(explode('@',$printer->name)[0], 0, 12)}}</h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="col-xs-12 text-center bold" id="txtPrinterStatus">Please select a printer.</h3>
                        </div>
                        <form class="form-horizontal" role="form">
                            <div class="col-xs-12">
                                <div class="row">
                                    <img class="col-xs-12" id="imgPrinter" style="filter: grayscale(1);"
                                         src="{{asset('assets/img/printers/printer1_big.png')}}"/>
                                </div>
                                <div class="row panel-btn">
                                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                                        <button type="button" class="btn btn-default" id="btnCommand1">Pause
                                        </button>
                                        <button type="button" class="btn btn-default" id="btnCommand2">Head ON</button>
                                        <button type="button" class="btn btn-default" id="btnCommand3">Bed ON</button>
                                        <button type="button" class="btn btn-default" id="btnCommand4">Kill Job</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- BLOCK END -->
            </div>
        </div>
        <!-- END ROW 1 -->

    </div>
    <!-- END CONTAINER -->
@endsection
@section('add_script')
    <script>
        var user_mail = "{{$user->email}}";
    </script>
    <script src="{{asset('assets/scripts/app.js?v=202004170725')}}"></script>
    <script src="{{asset('assets/scripts/custom.js')}}"></script>
@endsection
