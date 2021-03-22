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
            <h1>FORMULARIO DE REGISTRO DE PRODUCTO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Registro de Producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">REGISTRO DE PRODUCTOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url?>Producto/saveProducto" method="POST">
                <div class="card-body">
                  <input type="text" id='id_producto' name='id_producto' value='<?=(isset($row->id_producto))?$row->id_producto:0?>' hidden='true'>
                  <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="descripcion">NOMBRE</label>
                      <input type="text" required class="form-control" id="descripcion" name="descripcion" value="<?= (isset($row->id_producto))?$row->descripcion_pro:""?>" placeholder="Nombre del Producto">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="fecha_vencimiento">FECHA VENCIMIENTO</label>
                      <input type="date" required class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value='<?=(isset($row->id_producto))?$row->fecha_reg:""?>' placeholder="Fecha de vencimiento">
                    </div>
                  </div>
                  
                  <div class='row'>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="stock_minimo">STOCK MINIMO</label>
                      <input type="number" required class="form-control" id="stock_minimo" name="stock_minimo" value='<?=(isset($row->id_producto))?$row->stock_min_pro:null?>' placeholder="Stock minimo">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="stock">STOCK</label>
                      <input type="number" required class="form-control" id="stock" name="stock" value='<?=(isset($row->id_producto))?$row->stock_pro:null?>' placeholder="Stock del producto">
                    </div>
                  </div>          

                  <div class='row'>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="precio_compra">PRECIO COMPRA</label>
                      <input type="number" required step="any" class="form-control" id="precio_compra" name="precio_compra" value='<?=(isset($row->id_producto))?$row->precioc_pro:""?>' placeholder="Precio compra">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="precio">PRECIO VENTA</label>
                      <!-- value = '(isset($row->id_producto))?$row->password_usu:""'-->
                      <input type="number" required step="any" class="form-control" name="precio" id="precio" value='<?=(isset($row->id_producto))?$row->preciov_pro:""?>'  placeholder="Precio venta">
                    </div>
                  </div>
                  <div class='row'>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="numero_producto">NUMERO</label>
                      <!-- value = '(isset($row->id_producto))?$row->password_usu:""'-->
                      <input type="text" required class="form-control" name="numero_producto" id="numero_producto" value='<?=(isset($row->id_producto))?$row->num_pro:""?>' placeholder="Numero del producto">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ESTADO</label>
                            <select class="form-control" id="estado" name="estado">
                              <option <?=isset($row->estado_pro) && $row->estado_pro?"":'selected="true"'?> disabled="disabled">Selecciona uno</option>
                              <option <?=isset($row->estado_pro) && $row->estado_pro == 1?'selected="true"':""?> value='1'>Activo</option>
                              <option <?=isset($row->estado_pro) && $row->estado_pro == 0?'selected="true"':""?> value='0'>Fuera de servicio</option>
                            </select>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php require_once 'views/layout/footer.php'; ?>