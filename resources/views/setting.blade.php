@extends('layouts.template')
@section('content')
    <div class="container">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3"
             aria-hidden="true">
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
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN ALERTS PORTLET-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="font-size: 18px;">
                            Settings
                        </span>
                        <a href="{{url('monitor')}}" style="float: right;"> <i class="fa fa-reply"
                                                                               style="color:white;"></i> </a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <button class="btn btn-lg btn-info float-left col-md-2 col-xs-4" id = "download"><i
                                    class="fa fa-download"></i> Download
                            </button>
                            <button class="btn btn-lg btn-info float-right col-md-2 col-xs-4" id="addPrinter"><i
                                    class="fa fa-plus"></i> Add Printer
                            </button>
                        </div>
                        <div class="wrap">
                            <div class="frame" id="smart">
                                <ul class="clearfix" id="allprinters">
                                    @foreach($printers as $printer)
                                        <li id="{{$printer->email}}">
                                            <div class="note note-info">
                                                <div class="row">
                                                    <div class="col-md-3 col-xs-4 p-0">
                                                        <img src="{{asset('assets/img/printers/printer1_small.png')}}"
                                                             class="col-md-8 col-xs-12 p-0">
                                                    </div>
                                                    <div class="col-md-9 col-xs-8">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <span class="col-md-12 note-label">Name</span>
                                                                <span type="text"
                                                                      class="col-md-12 note-value note-span span-name">{{$printer->name}}</span>
                                                                <input type="text"
                                                                       class="col-md-12 note-value note-input input-name"
                                                                       value="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="col-md-12 note-label">Type</span>
                                                                <span type="text"
                                                                      class="col-md-12 note-value note-span span-type">{{$printer->type}}</span>
                                                                <input type="text"
                                                                       class="col-md-12 note-value note-input input-type">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="col-md-12 note-label">Password</span>
                                                                @if($printer->permission === "approved")
                                                                    <span type="text"
                                                                          class="col-md-12 note-value note-span span-password">{{$printer->password}}</span>
                                                                @else
                                                                    <span type="text"
                                                                          class="col-md-12 note-value note-span span-password">{{$printer->readonlypassword}}</span>
                                                                @endif
                                                                <input type="text"
                                                                       class="col-md-12 note-value note-input input-password">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="col-md-12 note-label">Email</span>
                                                                <span type="text"
                                                                      class="col-md-12 note-value note-span span-address">{{$printer->email}}</span>
                                                                <input type="email"
                                                                       class="col-md-12 note-value note-input input-address"
                                                                       readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-top:25px;">
                                                            <div class="col-md-offset-6 col-md-3 col-xs-6">
                                                                <button type="button"
                                                                        class="btn btn-lg btn-success btn-edit"><i
                                                                        class="fa fa-edit"></i> Edit
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btn-lg btn-success btn-save"><i
                                                                        class="fa fa-save"></i> Save
                                                                </button>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6">
                                                                <button type="button"
                                                                        class="btn btn-lg btn-danger btn-cancel"><i
                                                                        class="fa fa-times"></i> Cancel
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btn-lg btn-danger btn-delete"><i
                                                                        class="fa fa-times"></i> Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li id="last_item">
                                        <div class="note note-info">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-4 p-0">
                                                    <img src="{{asset('assets/img/printers/printer1_small.png')}}"
                                                         class="col-md-8 col-xs-12 p-0">
                                                </div>
                                                <div class="col-md-9 col-xs-8">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <span class="col-md-12 note-label">Name</span>
                                                            <span type="text"
                                                                  class="col-md-12 note-value note-span span-name"></span>
                                                            <input type="text"
                                                                   class="col-md-12 note-value note-input input-name"
                                                                   value="">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span class="col-md-12 note-label">Type</span>
                                                            <span type="text"
                                                                  class="col-md-12 note-value note-span span-type"></span>
                                                            <input type="text"
                                                                   class="col-md-12 note-value note-input input-type">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span class="col-md-12 note-label">Password</span>
                                                            <span type="text"
                                                                  class="col-md-12 note-value note-span span-password"></span>
                                                            <input type="text"
                                                                   class="col-md-12 note-value note-input input-password">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span class="col-md-12 note-label">Email</span>
                                                            <span type="text"
                                                                  class="col-md-12 note-value note-span span-address"></span>
                                                            <input type="email"
                                                                   class="col-md-12 note-value note-input input-address">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:25px;">
                                                        <div class="col-md-offset-6 col-md-3 col-xs-6">
                                                            <button type="button"
                                                                    class="btn btn-lg btn-success btn-edit"><i
                                                                    class="fa fa-edit"></i> Edit
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-lg btn-success btn-save"><i
                                                                    class="fa fa-save"></i> Save
                                                            </button>
                                                        </div>
                                                        <div class="col-md-3 col-xs-6">
                                                            <button type="button"
                                                                    class="btn btn-lg btn-danger btn-cancel"><i
                                                                    class="fa fa-times"></i> Cancel
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-lg btn-danger btn-delete"><i
                                                                    class="fa fa-times"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
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
    <script src="{{asset('assets/scripts/setting.js?v=202004210948')}}"></script>
@endsection
