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
            <h1>LISTA DE USUARIOS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Lista de Usuarios</li>
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
              <h3 class="card-title">En este apartado se encuentran todos los usuarios registrados en el sistema</h3>
            </div>
            <div class='col-sm-06'>
              <?php if(isset($_SESSION['mensaje']) && $_SESSION['mensaje']=='correct'): ?>
                          <div id="mensaje_completado">
                              <div>Se guardaron los datos correctamente</div>
                          </div>
                      <?php endif; ?>
                      <?php if(isset($_SESSION['mensaje']) && $_SESSION['mensaje']=='failed'): ?>
                          <div id="mensaje_error">
                              <div>Error, al guardar  producto</div>
                          </div>
                      <?php endif; ?>
              </div>
            </div>
            <?php Utils::deleteSession("mensaje");?>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>DNI</th>
                  <th>NOMBRE</th>
                  <th>APELLIDOS</th>
                  <th>CELULAR</th>
                  <th>E-MAIL</th>
                  <th>NICK</th>
                  <th>ESTADO</th>
                  <th>OPCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_object($lista)): ?>
                    <tr>
                      
                      <td><?=$row->dni_usu?></td>
                      <td><?=$row->nombre_usu?></td>
                      <td><?=$row->apellido_usu?></td>
                      <td><?=$row->celular?></td>
                      <td><?=$row->correo_usu?></td>
                      <td><?=$row->nick_usu?></td>
                      <td><?php if($row->estado == 1){echo '<span class="btn btn-success">Activo</span>';}else{echo '<span class="btn btn-danger">Inactivo</span>';} ?></td>
                      <td>
                        <a href="<?=base_url?>Usuario/editarUsuario&id=<?=$row->id_usuario?>" class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                        <a href="<?=base_url?>Usuario/deleteUsuario&id=<?=$row->id_usuario?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                <?php endwhile;?>
                </tfoot>
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

