<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>TB</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>CONTROL</b>ESCOLAR</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{asset('/uploads/avatars/')}}/{{ Auth::user()->avatar }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{asset('/uploads/avatars/')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->nombre }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                 {{--      <li class="user-body">
                            <div class="col-xs-12 btn-lg btn-block text-center">
                                <a href="{{ url('updatepassword')}}"><button class="btn btn-block uppercase btn-primary">Actualizar contraseña</button></a>
                             <a href="{{ url('updatecorreo')}}"><button class="btn btn-block uppercase btn-primary">Actualizar Correo</button></a>

                               <a href="{{ url('updatename')}}"><button class="btn btn-block uppercase btn-primary">Actualizar Nombre</button></a>

                            </div> --}}
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
