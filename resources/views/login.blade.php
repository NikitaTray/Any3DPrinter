@extends('layouts.printer')

@section('content')
    <div class="panel-heading"><h3 class="panel-title">Login to your account with "g+"</h3></div>
    <div class="panel-body">
        <form class="form-horizontal" role="form">
            <h3></h3>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="E-mail">
            </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password">
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="checkbox-list"><label class="checkbox"><div class="checker"><span><input type="checkbox"></span></div> Remember me</label></div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <button type="button" class="btn blue pull-right disabled">Login</button>
                </div>
            </div>

            <hr>

            <div class="login-socio">
                <p class="text-muted">or login using:</p>
                <ul class="social-icons">
                    <li><a class="facebook" data-original-title="facebook" ></a></li>
                    <li><a class="twitter" data-original-title="Twitter"></a></li>
                    <li><a class="googleplus" data-original-title="Goole Plus" id="googleLogin" href="{{ url('/auth/google') }}"></a></li>
                    <li><a class="linkedin" data-original-title="Linkedin"></a></li>
                </ul>
            </div>
        </form>
    </div>
@endsection
