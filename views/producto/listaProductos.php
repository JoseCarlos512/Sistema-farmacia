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
            <h1>LISTA DE PRODUCTOS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Lista de Productos</li>
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
              <h3 class="card-title">En este apartado se encuentran todos los productos registrados en el sistema</h3>
            </div>
            <div class="col-sm-06">
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
            <?php Utils::deleteSession("mensaje");?>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>FECHA<br/>REGISTRO</th>
                  <th>FECHA<br/>VENCIMIENTO</th>
                  <th>PRECIO<br/>VENTA</th>
                  <th>STOCK</th>
                  <th>ESTADO</th>
                  <?php if(isset($_SESSION['admin'])): ?>
                  <th>OPCIONES</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php while($row = mysqli_fetch_object($lista)): ?>
                      <tr>
                        
                        <td><?=$row->id_producto?></td>
                        <td><?=$row->descripcion_pro?></td>
                        <td><?=$row->fecha_reg?></td>
                        <td><?=$row->fecha_venci_pro?></td>
                        <td><?=$row->preciov_pro?></td>
                        <td><?=$row->stock_pro?></td>
                        <td><?php if($row->estado_pro == 1){echo '<span class="btn btn-success">Activo</span>';}else{echo '<span class="btn btn-danger">Inactivo</span>';} ?></td>
                        <?php if(isset($_SESSION['admin'])): ?>
                        <td>
                          <a href="<?=base_url?>Producto/getDatosProducto&id=<?=$row->id_producto?>" class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                          <a href="<?=base_url?>Producto/deleteProducto&id=<?=$row->id_producto?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
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

