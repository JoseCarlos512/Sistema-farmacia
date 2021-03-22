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
            <h1>LISTA DE VENTAS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Lista de Ventas</li>
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
              <h3 class="card-title">En este apartado se filtraremos entre fechas el reporte de ventas</h3>
            </div>
            <div class="card-body">
              <form action="<?=base_url?>Venta/listarPorFechas" method="POST">
                  <div class="row">
                
                      <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="fecha_inicio">FECHA INICIO</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?= (isset($row->id_producto))?$row->descripcion_pro:""?>" >
                      </div>
                      <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="fecha_fin">FECHA FIN</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value='<?=(isset($row->id_producto))?$row->fecha_reg:""?>' >
                      </div>
                      <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <button  type="submit" class="form-control btn btn-primary"> <span class="fa fa-search"></span> Buscar entre fechas</button>
                      </div>
                  </div>
              </form>  
            </div>
            
            
            <!-- /.card-header -->

            <!-- BOTON NUEVO -->
            <div class="row">
             
            </div>
            <?php Utils::deleteSession("correct");?>
            <?php Utils::deleteSession("failed");?>

            <div class="card-body">
              <table id="<?=$ventaEspecifica== true ?'example1':''?>"  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>FECHA</th>
                  <th>CLIENTE</th>
                  <th>USUARIO</th>
                  <th>DOCUMENTO</th>
                  <th>NUMERO</th>
                  <th>TOTAL VENTA</th>
                  <?php if(!$ventaEspecifica): ?>
                  <th>OPCIONES</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_object($ventas)): ?>
                    <tr>
                      <td><?=$row->fecha_venta?></td>
                      <td><?=$row->nombre_cli." ".$row->apellido_cli?></td>
                      <td><?=$row->nombre_usu?></td>
                      <td>Boleta</td>
                      <td><?=$row->num_venta?></td>
                      <td><?=$row->total_venta?></td>
                      <?php if(!$ventaEspecifica): ?>
                      <td>
                        <a href="<?=base_url?>Venta/visualizarVenta&id=<?=$row->id_venta?>" class="btn btn-warning" ><i class="fa fa-eye"></i></a>
                        <a href="<?=base_url?>Venta/generarBoleta&id=<?=$row->id_venta?>" class="btn btn-info" ><i class="fa fa-file"></i></a>
                        
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

