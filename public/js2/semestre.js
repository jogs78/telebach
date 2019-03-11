
  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var name = button.data('name')
      var description = button.data('descripcion')
      var degree_id = button.data('degree_id')
      var modal = $(this)

      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #descripcion').val(description);
      modal.find('.modal-body #degree_id').val(degree_id);
})


   $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var degree_id = button.data('degree_id')
      var modal = $(this)

      modal.find('.modal-body #degree_id').val(degree_id);
})


