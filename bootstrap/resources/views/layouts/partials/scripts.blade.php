<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
  {{--   <script src="{{ asset('/js2/jquery-2.1.0.min.js')}}"></script> --}}
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- Combobox dependientes-->
<script src="{{ asset('/js2/dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js2/dropdown1.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js2/semestre.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js2/validate.js') }}" type="text/javascript"></script>





<!-- Multiple Select-->
<script src="{{ asset('/js/multiple-select.js') }}" type="text/javascript"></script>
<!-- Select2 -->
<script src="{{ asset('/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
      <!-- script for Datatables -->
      <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
      <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
      <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
      <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
      <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
      <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>


      <script>
        $(document).ready(function(){
          $('#students').DataTable({

           "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

          },

          dom: 'Bfrtip',
          buttons: [
          'excel', 'pdf', 'print'
          ]
        });
          $('#directors').DataTable({
            responsive: true,
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
            ]
          });

          $('#degrees').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
         ]

          });


  $('#materias').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
         ]

          });




          $('#matters').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
            ]
          });






          $('#groups').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
            ]
          });
          $('#grop').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
            ]
          });
          $('#periods').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
            ]
          });
          $('#boleta').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
          });
          $('#califications').DataTable({
           "bFilter": false,
           "bInfo": false,
           "bPaginate": false,
           "ordering": false,
           "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          },
          dom: 'Bfrtip',
          buttons: [
          'pdf', 'print'
          ]
        });
          $('#myTable').DataTable();
        });
      </script>
      <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
