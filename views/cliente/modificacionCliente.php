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
            <h1>FORMULARIO DE MODIFICACION DEL CLIENTE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Modificación del Cliente</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modificar Cliente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url?>Cliente/modificarCliente" method="POST">
              	<?php if(isset($_SESSION['completed'])): ?>
                        <div id="mensaje_completado">
                            <div><?= $_SESSION['completed'] ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['failed'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['failed'] ?></div>
                        </div>
                    <?php endif; ?>
                <div class="card-body">
                  <input type="hidden" name="id_modificar" value="<?= $id_modificar ?>">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">NOMBRE</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= isset($cliente)? $cliente->nombre_cli : ''; ?>">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputPassword1">APELLIDOS</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?= isset($cliente)? $cliente->apellido_cli : ''; ?>">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" id="dni" name="dni" placeholder="Documento de identidad" value="<?= isset($cliente)? $cliente->dni_cli : ''; ?>">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputPassword1">CELULAR</label>
                    <input type="number" class="form-control" id="celular" name="celular" placeholder="Número de celular" value="<?= isset($cliente)? $cliente->celular : ''; ?>">
                  </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">DIRECCION</label>
                    <input type="text" class="form-control" id="direccion" name='direccion' placeholder="Dirección" value="<?= isset($cliente)? $cliente->direccion : ''; ?>">
                  </div>
  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                  <?php utils::borrarForm(); ?>
                  <?php utils::borrarErrores(); ?>
                  <?php utils::borrarCompletado(); ?>
                  <?php utils::borrarFallido(); ?>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php require_once 'views/layout/footer.php'; ?>