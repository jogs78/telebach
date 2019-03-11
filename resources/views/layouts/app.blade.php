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
<body class="skin-red sidebar-mini">
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

   $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var matter_id = button.data('matter_id')
      var modal = $(this)

      modal.find('.modal-body #matter_id').val(matter_id);
})
</script>

<script>


  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var name = button.data('name')
      var description = button.data('description')
      var degree_id = button.data('degree_id')
      var modal = $(this)

      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #degree_id').val(degree_id);
})


  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var degree_id = button.data('degree_id')
      var modal = $(this)

      modal.find('.modal-body #degree_id').val(degree_id);
})



</script>

  ////edit///








