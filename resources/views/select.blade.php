@extends('layouts.printer')

@section('content')
    <div class="panel-heading"><h3 class="panel-title">Hi "{{$shortName}}", please input a printer detail.</h3></div>
    <div class="panel-body row">
        <form class="form-horizontal col-md-9" role="form">
            <h3></h3>
            <div class="input-group margin-bottom-25">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="E-mail" id="txtEmail">
            </div>
            <div class="input-group margin-bottom-25">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" id="txtPassword">
            </div>

            <div class="row">
                <div class="col-md-offset-6 col-sm-offset-6 col-md-6 col-sm-6">
                    <button type="button" class="btn blue pull-right" id="btnSelect">Select</button>
                </div>
            </div>
        </form>
        <div class="col-md-3">
            <img src="{{asset('assets/img/printer.png')}}" class="img-responsive" style="margin-top:-30px; margin-bottom: -30px;"/>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{asset('assets/scripts/login.js')}}"></script>
@endsection
