@extends('layouts.template')
@section('content')
    <div class="container">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN ALERTS PORTLET-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="font-size: 18px;">
                            Downloads
                        </span>
                        <a href="{{url('setting')}}" style="float: right;"> <i class="fa fa-reply"
                                                                               style="color:white;"></i> </a>
                    </div>
                    <div class="panel-body">
                        <div class="wrap">
                            <div class="frame" id="smart">
                                <ul class="clearfix" id="allprinters" style="font-size: 17px;">
                                    {{--                                    <li style="font-size: 15px; margin-bottom: 20px;">Current--}}
                                    {{--                                        Version: {{$currentVersion}}</li>--}}
                                    {{--                                    @foreach($downloads as $item)--}}
                                    {{--                                        @if($item->name !== "main")--}}
                                    {{--                                            <li class="note note-info"><a href="{{$item->url}}">{{$item->name}} &nbsp;&nbsp;&nbsp;&nbsp; {{$item->version}}</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        @endif--}}
                                    {{--                                    @endforeach--}}
                                    <li class="note note-info"><a href="#">1. Prerequesties</a></li>
                                    <ul class="tree_ul_first" style="margin-left: 31px;">
                                        <li class="note note-info"><a href="wrar591.zip">a. WinRAR</a></li>
                                        <li class="note note-info"><a href="EcosystemApps.zip">b. Ecosystem Apps</a></li>
                                        <ul class="tree_ul_second" style="margin-left: 37px;">
                                            <li class="note note-info"><a href="Slic3r-1.3.0.64bit.zip">1. Slic3r</a></li>
                                            <li class="note note-info"><a href="OpenSCAD-2019.05-x86-64-Installer.zip">2. OpenSCAD</a></li>
                                            <li class="note note-info"><a href="FreeCAD-0.18.4.980bf90-WIN-x64-installer.zip">3. FreeCAD</a></li>
                                            <li class="note note-info"><a href="MeshLab2020.03-windows.zip">4. MeshLab</a></li>
                                            <li class="note note-info"><a href="FlatCAM_beta_8.991_x64_installer.zip">5. FlatCAM</a></li>
                                            <li class="note note-info"><a href="qcad-3.25.2-trial-win64-installer.zip">6. QCAD</a></li>
                                            <li class="note note-info"><a href="TeamViewer_Setup_v9.zip">7. TeamViewer9</a></li>
                                            <li class="note note-info"><a href="inkscape-0.92.5-x64.zip">8. InkScape</a></li>
                                            <li class="note note-info"><a href="gimp-2.10.20-setup-1.zip">9. GIMP</a></li>
                                        </ul>
                                        <li class="note note-info"><a href="readerdc_en_ka_cra_install.zip">c. Adobe Reader</a></li>
                                    </ul>
                                    <li class="note note-warning"><a href="#">2. Repetrel</a></li>
                                    <ul class="tree_ul_first" style="margin-left: 31px;">
                                        <li class="note note-warning"><a href="Repetrel_{{$currentVersion}}_Installer.zip">a. Latest Full Repetrel - {{$currentVersion}}</a></li>
                                        <ul class="tree_ul_second" style="margin-left: 37px;">
                                            <li class="note note-warning"><a href="BIN.zip">1. Binary Folder</a></li>
                                            <li class="note note-warning"><a href="Slic3r_Recipes_2020.04.08.rar">2. Slic3r recipes</a></li>
                                            <li class="note note-warning"><a href="Manuals_Settings_20200920.rar">3. Manuals and
                                                    Head Settings</a></li>
                                        </ul>
                                        <li class="note note-warning"><a href="Repetrel_Exp_Installer.zip">b. Repetrel for Experiment - 4.2.295</a></li>
                                    </ul>
                                    <li class="note note-success"><a href="SurferBuddy_{{$surferVersion}}_Installer.zip">3. SurferBuddy - {{$surferVersion}}</a></li>
                                    <li class="note note-danger"><a href="PhoneBuddy{{$phoneVersion}}.apk">4. PhoneBuddy - {{$phoneVersion}}</a></li>
                                </ul>
                            </div>
                            <!--<div class="v-scrollbar">-->
                            <!--<div class="handle">-->
                            <!--<div class="mousearea"></div>-->
                            <!--</div>-->
                            <!--</div>-->
                        </div>

                    </div>
                </div>
                <!-- END ALERTS PORTLET-->
            </div>
        </div>
    </div>
@endsection
@section("add_script")
    <script>
        @isset($file)
        $(document).ready(function () {
            window.location.href = '/download/' + '{{$file}}';
        });
        @endisset
    </script>
@endsection
