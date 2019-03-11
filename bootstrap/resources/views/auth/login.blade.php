@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page mycolor">
<div class="myheader" style="display: flex;
    background: #008080;
    font-family: tahoma; 
    font-size: 17px;
    color:#A5A2A1;
    justify-content:space-around;
    align-items:center;">
    <!--icono de parte superior ala iquierda -->
            <div class="dgeti"><a href="{{ url('/')}}"><img src="img1/IMA.png" height="15%" width="89px" alt=""></a></div>
        <div class="texto" style=""><center>
        
        <h2 style="color: #000000;">SISTEMA DE CONTROL ESCOLAR</h2>
        <h3 style="color: #000000;">Escuela Telebachillerato Núm. 13 
        "Daniel Cosio Villegas" </h3></center>
        </div>
        <img src="img1/sep.png" height="18%" width="18%" alt="">
        </div>
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>SISTEMA DE CONTROL</b>ESCOLAR</a>
        </div><!-- /.login-logo -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box-body mycolor2">
    <p class="login-box-msg" style="color: #fff"> {{ trans('adminlte_lang::message.siginsession') }} </p>
    <form action= "{{ url('/login') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="correo" value="{{old('email')}}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label style="color: #fff">
                        <input type="checkbox" name="remember" style="color: #fff"> {{ trans('adminlte_lang::message.remember') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-md btn-danger btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
            </div><!-- /.col -->
        </div>
    </form>

    <a href="{{ url('/password/reset') }}" style="color: #fff">{{ trans('adminlte_lang::message.forgotpassword') }}</a>

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
