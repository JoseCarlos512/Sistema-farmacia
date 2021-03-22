<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>VENTA</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Registro de Venta</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12 col-sm-12">

        <form name="formulario" id="formulario" method="POST">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">REALIZAR VENTA</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formulario" name="formulario">
                <div class="card-body">
                  
                  <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label>CLIENTE(*):</label>
                      <input type="hidden" name="idventa" id="idventa">
                      <select id="idcliente" name="idcliente" class="form-control selectpicker" data-live-search="true" >
                        
                      </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="fecha_hora">FECHA</label>
                      <input type="date" readonly class="form-control" id="fecha_hora" name="fecha_hora" >
                    </div>
                  </div>
                  
                  <div class='row'>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label for="tipo_comprobante">TIPO DE COMPROBANTE</label>
                      <select name="tipo_comprobante" id="tipo_comprobante" class="form-control selectpicker" disabled="true" required="">
                        <option selected="true" value="Boleta">Boleta</option>
                        <option value="Factura">Factura</option>
                        <option value="Ticket">Ticket</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label for="num_comprobante">NUMERO</label>
                      <input type="number" minlength="1" maxlength="3" required class="form-control" id="num_comprobante" name="num_comprobante" value='000' placeholder="Numero de comprobante">
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label for="impuesto">IMPUESTO</label>
                      <input type="number" required class="form-control" id="impuesto" name="impuesto" value=18 placeholder="Impuesto">
                    </div>
                  </div>
                  
                  <div class='row'>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label for="efectivo_venta">PAGO EN EFECTIVO</label>
                      <input class="form-control" required type="number" name="efectivo_venta" id="efectivo_venta">
                    </div>
                
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label for="vuelto_venta">VUELTO</label>
                      <input type="number" readonly class="form-control" id="vuelto_venta" name="vuelto_venta">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <button class="btn btn-info" id="calcular_vuelto">Calcular vuelto <i class="fas fa-sync-alt"></i></button>
                    </div>
                  </div>
                  
                </div>
              </div>
              
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DETALLE DE VENTA</h3>
                </div>
                <div class="col-sm-06">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- BOTON AGREGAR ARTÍCULO (abre el modal) -->
                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     
                      <button id="btnAgregarArt" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1"> <span class="fa fa-plus"></span> Agregar Artículos</button>

                    </div>
                    <div class="table-responsive">
                      <table id="tabla_venta" class="table table-bordered table-striped table-condensed table-hover">
                        <thead>
                          <tr>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio venta</th>
                            <th>Subtotal</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>SUB-TOTAL</th>
                            <th></th>
                            <th> </th>
                            <th></th>
                            <th></th>
                            <th><h4 id="subtotal_calculado">S/. 0.00</h4><input type="hidden" name="subtotal_venta" id="subtotal_venta"></th>
                          </tr>
                          <tr>
                            <th>IGV</th>
                            <th></th>
                            <th> </th>
                            <th></th>
                            <th></th>
                            <th><h4 id="igv_calculado">S/. 0.00</h4><input type="hidden" name="igv_venta" id="igv_venta"></th>
                          </tr>
                          <tr>
                            <th>TOTAL</th>
                            <th></th>
                            <th> </th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">S/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                          </tr>
                        </tfoot>
                        </tfoot>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>















      <!-- VENTANA MODAL DE PRODUCTOS -->
      <div class="modal fade" tabindex="-1" id="modal1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4>PRODUCTOS FARMACEUTICOS</h4>
            </div>

            <div class="modal-body">
              <div class="table-responsive">

                <table id="tabla_venta_modal" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>OPCIONES</th>
                      <th>ID</th>
                      <th>N° REGISTRO</th>
                      <th>DESCRIPCIÓN</th>
                      <th>STOCK</th>
                      <th>PRECIO VENTA</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
                
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php require_once 'views/layout/footer.php'; ?>

