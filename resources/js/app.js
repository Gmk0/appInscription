require('./bootstrap');

import "admin-lte/plugins/jquery/jquery";

import "admin-lte/plugins/bootstrap/js/bootstrap.bundle";
import "admin-lte/dist/js/demo";

window.Swal = require("sweetalert2");
window.$ =require("jquery");

    import "admin-lte/plugins/datatables/jquery.dataTables";
    import "admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4";
    import "admin-lte/plugins/datatables-responsive/js/dataTables.responsive";
    import "admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4";
    import "admin-lte/plugins/datatables-buttons/js/dataTables.buttons";
    import "admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4";
    import "admin-lte/plugins/jszip/jszip";
    import "admin-lte/plugins/pdfmake/pdfmake";
    import "admin-lte/plugins/pdfmake/vfs_fonts.js";
    import "admin-lte/plugins/datatables-buttons/js/buttons.html5";
    import "admin-lte/plugins/datatables-buttons/js/buttons.print";
    import "admin-lte/plugins/datatables-buttons/js/buttons.colVis";


  $(function () {
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


