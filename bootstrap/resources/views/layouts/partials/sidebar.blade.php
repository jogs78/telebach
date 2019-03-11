<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    @if (! Auth::guest())
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('/uploads/avatars/')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <!-- Status -->
        <a href="#">
          <i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
      </div>
    </div>
    @endif

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..." />
        <!--  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>-->
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Menú</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active">
        <a href="{{ url('home') }}">
          <i class='fa fa-home'></i>
          <span>{{ trans('adminlte_lang::message.home') }}</span>
        </a>
      </li>
      @role('admi')
     <li class="treeview">
        <a href="#">
          <i class='fa fa-user-plus'></i>
          <span>Usuarios</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ url('/directors')}}">Director</a>
          </li>
          <li>
        {{--    <a href="{{ url('/fathers')}}">Padre de Alumno</a>    --}}
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class='fa fa-tasks'></i>
          <span>Catalogo</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ url('/periods')}}">Periodo</a>
          </li>
          <li>
            <a href="{{ url('/degrees')}}">Semestre</a>
          </li>

          <li>
            <a href="{{ url('/matters')}}">Materia</a>
          </li>
          <li>
            <a href="{{ url('/groups')}}">Grupos</a>
          </li>



</li>



        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class='fa fa-cube'></i>
          <span>Control Escolar</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ url('/docents')}}">Profesores</a>
          </li>



          <li><a href="{{url('/estructura')}}">{{ trans('crea estructura') }}</a></li>

           <li>
           <a href="{{url('/asignaciones')}}">{{ trans('Asignar materias al docente') }}</a>
           </li>

        </ul>
      </li>

      @endrole
       @role('docent')
 <?php
                $user = Auth::user();






                ?>



      <li class="treeview">
        <a href="#"><i class='fa fa-archive'></i> <span>Materias a mi cargo </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">




         @foreach($user->docentgroupclass()->get() as $element)
      @php
        $materia = App\Models\Matter::find($element->materia_id);
          $group = App\Models\Group::find($element->grupo_id);
          $period = App\Models\Period::find($element->periodo_id);@endphp
@if ($period->estado==='Activo')


          <li>
          <a href=" "> {!! $element->id !!}
             {!! $materia->nombre !!}</strong> |{{$group->nombre}} -  {{$period->periodo}}    </a>
          </li>
  @endif
@endforeach

        </ul>
      </li>
      <li>

   {{--      <li>
          <a href="{!! route('matters.docent', [$docent->id]) !!}">Grupos</a>
        </li>
      </li>
     <li>
        <a href="{{ url('chatfathers') }}">
          <i class='fa fa-comment'></i>
          <span>Chat con Padres</span>
        </a>
      </li>
      <li>
        <a href="{{ url('chatadmin') }}">
          <i class='fa fa-comment'></i>
          <span>Chat con Coordinador</span>
        </a>
      </li>--}}
      @endrole
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>