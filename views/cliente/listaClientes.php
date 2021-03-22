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
            <h1>LISTA DE CLIENTES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Lista de Clientes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">En este apartado se encuentran todos los clientes registrados en el sistema</h3>
            </div>
            <div class="col-sm-06">
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
            </div>
            <!-- /.card-header -->

            <!-- BOTON NUEVO -->
            <div class="row">
              <div class="col-md-2 ml-4 mt-1">
                <a href="<?= base_url ?>Cliente/registroCliente" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo Cliente</a>
              </div>
            </div>
            <?php Utils::deleteSession("completed");?>
            <?php Utils::deleteSession("failed");?>

            <div class="card-body">
              <table id="tabla_clientes" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>DNI</th>
                  <th>NOMBRE</th>
                  <th>APELLIDOS</th>
                  <th>CELULAR</th>
                  <th>DIRECCION</th>
                  <?php if(isset($_SESSION['admin'])): ?>
                  <th>OPCIONES</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_object($clientes)): ?>
                    <tr>
                      <td><?=$row->dni_cli?></td>
                      <td><?=$row->nombre_cli?></td>
                      <td><?=$row->apellido_cli?></td>
                      <td><?=$row->celular?></td>
                      <td><?=$row->direccion?></td>
                      <?php if(isset($_SESSION['admin'])): ?>
                      <td>
                        <a href="<?=base_url?>Cliente/modificacionCliente&id=<?=$row->id_cli?>" class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                        <a href="<?=base_url?>Cliente/eliminarCliente&id=<?=$row->id_cli?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                      </td>
                      <?php endif; ?>
                    </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php require_once 'views/layout/footer.php'; ?>

