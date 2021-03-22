<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  
<div class="box-header with-border">
    <h1 class="box-title">Usuario</h1>
    <div class="box-tools pull-right">
    </div>
</div>
<div class="panel-body" id="formularioregistros">
    <?php Utils::deleteSession("mensaje"); ?>
    <form action="<?=base_url?>Usuario/saveUsuario" enctype="multipart/form-data"  method="POST">
        <?php if(isset($rowUser)): ?>
            <input name="id" id="id" value="<?= isset($rowUser->id)?$rowUser->id:0 ?>" hidden="">
        <?php endif; ?>
        <div class="form-group col-lg-16 col-md-6 col-sm-6 col-xs-12">
            <label>Nombre(*):</label>
            <input type="text" class="form-control" value="<?= isset($rowUser->nombre)?$rowUser->nombre:""?>" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
        </div>
        <div class="form-group col-lg-16 col-md-6 col-sm-6 col-xs-12">
            <label>Apellidos(*):</label>
            <input type="text" class="form-control" value="<?= isset($rowUser->apellidos)?$rowUser->apellidos:""?>" name="apellidos" id="apellidos" maxlength="100" placeholder="Apellidos" required>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Rol(*):</label>
            <input type="text" class="form-control" value="<?= isset($rowUser->rol)?$rowUser->rol:""?>" name="rol" id="rol" maxlength="50" placeholder="Rol" required>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Usuario:</label>
            <input type="text" class="form-control" value="<?= isset($rowUser->usuario)?$rowUser->usuario:""?>" name="usuario" id="usuario" placeholder="Usuario" maxlength="70">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Email:</label>
            <input type="email" class="form-control" value="<?= isset($rowUser->email)?$rowUser->email:""?>" name="email" id="email" maxlength="50" placeholder="Email">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Clave (*):</label>
            <input type="password" class="form-control" value="<?= isset($rowUser->password)?$rowUser->password:""?>" name="clave" id="clave" maxlength="64" placeholder="Clave" required>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Permisos:</label>
            <ul style="list-style: none;" id="permisos">
                
                <!-- REVISARRRRRRRRRRRRR -->
                <?php while ($row = mysqli_fetch_object($lista)): ?>
                <li> <input type="checkbox" 
                    <?php 
                    if(isset($valores[$row->id_permiso-1])){
                        if($valores[$row->id_permiso - 1] == $row->id_permiso){
                            echo 'checked'; 
                        }else{ 
                            echo '';
                        }
                    }
                    ?> 
                    name="permiso[]" value="<?=$row->id_permiso?>"><?=$row->nombre?></li>
                <?php endwhile; ?>
            </ul>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Imagen:</label>
            <input type="file" class="form-control-file" name="file" id="file">
            <br>
            <?php if(isset($rowUser->imagen)): ?>
            <img src="<?=base_url?>images/usuario/<?=$rowUser->imagen?>" width="250px" height="150px" >
            <?php endif; ?>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            
            <a href="<?=base_url?>/Usuario/lista" class="btn btn-danger" ><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php'; ?>