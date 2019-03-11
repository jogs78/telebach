<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show



<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.partials.controlsidebar')

    @include('layouts.partials.footer')

</div><!-- ./wrapper -->

@section('scripts')
    @include('layouts.partials.scripts')

@show

</body>
</html>



</script>


<script>


  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var group_id= button.data('group_id')
var matter_id = button.data('matter_id')

      var docent_id = button.data('docent_id')
     var matter_group_id = button.data('matter_group_id')

      var modal = $(this)

      modal.find('.modal-body #group_id').val(group_id);

      modal.find('.modal-body #matter_id').val(matter_id)
      modal.find('.modal-body #docent_id').val(docent_id)
      modal.find('.modal-body #matter_group_id').val(matter_group_id)

})
</script>


<script>


  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var name = button.data('name')
      var key = button.data('key')
      var descripcion = button.data('descripcion')
      var unidades = button.data('unidades')
      var degree_id = button.data('degree_id')

      var matter_id = button.data('matter_id')


      var modal = $(this)

      modal.find('.modal-body #name').val(name);

      modal.find('.modal-body #key').val(key)
      modal.find('.modal-body #descripcion').val(descripcion)
      modal.find('.modal-body #unidades').val(unidades)
      modal.find('.modal-body #degree_id').val(degree_id)
      modal.find('.modal-body #matter_id').val(matter_id)

})


  ////edit///
<script>


  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var docente_id = button.data('docente_id')


      var matter_id = button.data('asignacion_id')


      var modal = $(this)

      modal.find('.modal-body #docente_id').val(docente_id);


      modal.find('.modal-body #asignacion_id').val(asignacion_id)

})


  ///////


  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var matter_id = button.data('matter_id')
      var modal = $(this)

      modal.find('.modal-body #matter_id').val(matter_id);
})


</script>


<script>


</script>




