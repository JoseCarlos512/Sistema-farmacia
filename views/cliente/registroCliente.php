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
            <h1>FORMULARIO DE REGISTRO DE CLIENTE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Registro de Cliente</li>
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
                <h3 class="card-title">Registrar Cliente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url?>Cliente/registrarCliente" method="POST">
              	
                <div class="card-body">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">NOMBRE</label>
                    <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputPassword1">APELLIDOS</label>
                    <input type="text" required class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="dni">DNI</label>
                    <input type="text" minlength="8" maxlength="8" required class="form-control" id="dni" name="dni" placeholder="Documento de identidad">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputPassword1">CELULAR</label>
                    <input type="text" minlength="9" maxlength="9" required class="form-control" id="celular" name="celular" placeholder="Número de celular">
                  </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">DIRECCION</label>
                    <input type="text" required class="form-control" id="direccion" name='direccion' placeholder="Dirección">
                  </div>
  
                
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary">Registrar <i class="far fa-save"></i></button>
                  </div>
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