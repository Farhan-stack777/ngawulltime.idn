<script type="text/javascript">
$('#modal-reset').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');     
     var username        = $(e.relatedTarget).data('username');

     
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="username"]').val(username);
      
   
});
</script>

<!-- jQuery -->
<script src="../_aset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../_aset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../_aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../_aset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../_aset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../_aset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../_aset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../_aset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../_aset/plugins/moment/moment.min.js"></script>
<script src="../_aset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../_aset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../_aset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../_aset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../_aset/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_aset/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../_aset/dist/js/pages/dashboard.js"></script>

<!-- batasan -->

<!-- jQuery -->
<script src="../_aset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../_aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../_aset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../_aset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../_aset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../_aset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../_aset/plugins/jszip/jszip.min.js"></script>
<script src="../_aset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../_aset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../_aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_aset/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example0").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [""]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




<!-- jQuery -->
<script src="../_aset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../_aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../_aset/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../_aset/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../_aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_aset/dist/js/demo.js"></script>