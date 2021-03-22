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
            <h1>FORMULARIO DE REGISTRO DE USUARIO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Registro de Usuario</li>
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
                <h3 class="card-title">REGISTRO DE USUARIOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url?>Usuario/registrarUsuario" method="POST">
                <div class="card-body">
                  <input type="text" id='id_usuario' name='id_usuario' value='<?=(isset($row->id_usuario))?$row->id_usuario:""?>' hidden='true'>
                  <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="exampleInputEmail1">NOMBRE</label>
                      <input type="text" required class="form-control" id="nombre" name="nombre" value="<?= (isset($row->id_usuario))?$row->nombre_usu:""?>" placeholder="Nombre">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="exampleInputPassword1">APELLIDOS</label>
                      <input type="text" required class="form-control" id="apellidos" name="apellidos" value='<?=(isset($row->id_usuario))?$row->apellido_usu:""?>' placeholder="Apellidos">
                    </div>
                  </div>
                  
                  <div class='row'>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="dni">DNI</label>
                      <input type="text" required class="form-control" minlength="8" maxlength="8" id="dni" name="dni" value='<?=(isset($row->id_usuario))?$row->dni_usu:null?>' placeholder="Documento de identidad">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="exampleInputPassword1">CELULAR</label>
                      <input type="text" required class="form-control" minlength="9" maxlength="9" id="movil" name="movil" value='<?=(isset($row->id_usuario))?$row->celular:null?>' placeholder="Numero de movil">
                    </div>
                  </div>
                  
                  <div class='row'>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label for="exampleInputEmail1">EMAIL</label>
                      <input type="email" required class="form-control" id="correo" name='correo' value='<?=(isset($row->id_usuario))?$row->correo_usu:""?>' placeholder="Correo electronico">
                    </div>
                  </div>

                  <div class='row'>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="exampleInputPassword1">NICK</label>
                      <input type="text" required class="form-control" id="nick" name="nick" value='<?=(isset($row->id_usuario))?$row->nick_usu:""?>' placeholder="Usuario">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="exampleInputPassword1">PASSWORD</label>
                      <!-- value = '(isset($row->id_usuario))?$row->password_usu:""'-->
                      <input type="password" required class="form-control" name="password" id="password"  placeholder="Contraseña">
                    </div>
                  </div>
                  <div class='row'>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>TIPO USUARIO</label>
                            <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                              <option <?=isset($row->id_tipo_usu)?"":"selected='true'"?>>Selecciona uno</option> 
                              <?php while($rowTU = mysqli_fetch_object($lista_tipo_usuario)): ?> 
                                <option <?=isset($row->id_tipo_usu) && $row->id_tipo_usu==$rowTU->id_tipo_usu?'selected="true"':"" ?> value="<?=$rowTU->id_tipo_usu?>"><?=$rowTU->descripcion?></option>
                              <?php endwhile;?>
                            </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ESTADO</label>
                            <select class="form-control" id="estado" name="estado">
                              <option value="1" <?= isset($row->estado) && $row->estado==0?"":"selected='true'"?>>Activo</option> 
                              <option value="0" <?= isset($row->estado) && $row->estado==1?"":"selected='true'"?>>Inactivo</option> 
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