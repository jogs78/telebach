@extends('layouts.auth')

@section('htmlheader_title')
    Password recovery
@endsection

@section('content')

<body class="login-page mycolor">
<div class="myheader" style="display: flex;
    background: #008080;
    font-family: tahoma; 
    font-size: 17px;
    color:#A5A2A1;
    justify-content:space-around;
    align-items:center;">
    <!--icono de parte superior ala iquierda -->
            <div class="dgeti"><a href="{{ url('/')}}"><img src="../img1/IMA.png" height="15%" width="89px" alt=""></a></div>
        <div class="texto" style=""><center>
        
        <h2 style="color: #000000;">SISTEMA DE CONTROL ESCOLAR</h2>
        <h3 style="color: #000000;">Escuela Telebachillerato Núm. 13 
        "Daniel Cosio Villegas" </h3></center>
        </div>
        <img src="../img1/sep.png" height="18%" width="18%" alt="">
        </div>

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>SISTEMA DE CONTROL</b>ESCOLAR</a>
        </div><!-- /.login-logo -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
            <p class="login-box-msg" style="color: #fff">Reset Password</p>
            <form action="{{ url('/password/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-2">
                    </div><!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Restablecer</button>
                    </div><!-- /.col -->
                    <div class="col-xs-2">
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/login') }}" style="color: #fff">Log in</a><br>
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
