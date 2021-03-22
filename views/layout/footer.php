<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Sistema Farmacéutico Goliat</a></strong>
    Derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?=base_url?>assets/plugins/DataTables-1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/Buttons-1.6.5/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/Buttons-1.6.5/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/Buttons-1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/jszip/jszip.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        language: {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros disponibles",
            "infoFiltered": "(fltrado de _MAX_ registros totales)",  
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
              }
        }
    } );

    $('#example2').DataTable( {
        language: {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros disponibles",
            "infoFiltered": "(fltrado de _MAX_ registros totales)",  
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
              }
        }
    } );


    $('#tabla_clientes').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                title: 'Sistema Farmacéutico Goliat | Lista de Clientes',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'csvHtml5',
                title: 'Sistema Farmacéutico Goliat | Lista de Clientes',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5]
                }
            }, 
            {
                extend: 'excelHtml5',
                title: 'Sistema Farmacéutico Goliat | Lista de Clientes',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5]
                }
            }, 
            {
                extend: 'pdfHtml5',
                title: 'Sistema Farmacéutico Goliat | Lista de Clientes',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5]
                }
            }, 
            {
                extend: 'print',
                title: 'Sistema Farmacéutico Goliat | Lista de Clientes',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5]
                }
            }
        ],
        language: {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros disponibles",
            "infoFiltered": "(fltrado de _MAX_ registros totales)",  
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
              }
        }
    } );
} );
</script>

<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

<script type="text/javascript" src="<?=base_url?>assets/js_propios/venta.js"></script>
</body>
</html>
