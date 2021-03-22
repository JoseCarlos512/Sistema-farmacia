<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/navbar.php'; ?>
<?php require_once 'views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- 
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div <?= isset($_SESSION['admin'])? 'class="row"' : 'class="row justify-content-around"' ?>>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$cantidadVentas?></h3>

                <p>Ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=base_url?>Venta/listar_ventas" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$cantidadProductos?><sup style="font-size: 20px"></sup></h3>

                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url ?>Producto/index" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?php if(isset($_SESSION['admin'])): ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$cantidadUsuarios;?></h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url ?>Usuario/listarUsuarios" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif; ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$cantidadClientes?></h3>

                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?= base_url ?>Cliente/listarClientes" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Avisos
                </h3>
                <div style="display:flex; justify-content:center;">

                    <?php
                    echo "Fecha del sistema: " . date('Y-m-d');
                    ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="callout callout-success">
                    <h2>Bienvenido al Sistema Farmacéutico Goliat</h2>

                    <p><h2>Usuario <?= $rol." : ".$nombre." ".$apellido; ?></h2></p>
                  </div>

              <!-- CARD DE PRODUCTOS CON STOCK < 7 -->
              <?php if($lista && $lista->num_rows>=1): ?>

                <!-- TARJETA DE ALERTA ROJA -->
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="card bg-danger">
                      <div class="card-header">
                        <h3 class="card-title">¡Stocks agontandose!</h3>
                      </div>
                      <div class="card-body">
                        Los productos de la siguiente tabla tienen stocks menores a 7 <i class="fas fa-frown"></i>.
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>

                </div>
                
                <!-- TABLA PROD < 7 -->
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>OPCIONES</th>
                      <th>CODIGO</th>
                      <th>NOMBRE</th>
                      <th>FECHA<br/>REGISTRO</th>
                      <th>FECHA<br/>VENCIMIENTO</th>
                      <th>PRECIO<br/>VENTA</th>
                      <th>STOCK</th>
                      <th>ESTADO</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php while($row = mysqli_fetch_object($lista)): ?>
                        <tr>
                          <td>
                            <a href="<?=base_url?>Producto/getDatosProducto&id=<?=$row->id_producto?>" class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                            <a href="<?=base_url?>Producto/deleteProducto&id=<?=$row->id_producto?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                          </td>
                          <td><?=$row->id_producto?></td>
                          <td><?=$row->descripcion_pro?></td>
                          <td><?=$row->fecha_reg?></td>
                          <td><?=$row->fecha_venci_pro?></td>
                          <td><?=$row->preciov_pro?></td>
                          <td><?=$row->stock_pro?></td>
                          <td><?php if($row->estado_pro == 1){echo '<span class="btn btn-success">Activo</span>';}else{echo '<span class="btn btn-danger">Inactivo</span>';} ?></td>

                        </tr>
                    <?php endwhile;?>
                      </tbody>
                </table>
                  <?php else: ?>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="card bg-gradient-success">
                          <div class="card-header">
                            <h3 class="card-title">¡Stocks conformes!</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            Ningun stock de los productos es menor a 7 <i class="fas fa-laugh-beam"></i>.
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>

                    </div>
                <?php endif; ?>
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- Main row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php require_once 'views/layout/footer.php'; ?>