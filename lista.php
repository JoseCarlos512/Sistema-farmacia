<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="box-header with-border">
    <h1 class="box-title" >Usuario 
        <a  href="<?=base_url?>Usuario/agregar" class="btn btn-success" id="btnagregar" >
            <i class="fa fa-plus-circle"></i> Agregar
        </a>
    </h1>
    <div class="box-tools pull-right">
    </div>
</div>
<!-- /.box-header -->
<?php if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == 'correct'): ?>
    <div class="alert alert-success" role="alert">
        CORRECTO
    </div>
<?php elseif (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == 'error'): ?>
    <div class="alert alert-danger" role="alert">
        ERROR
    </div>
<?php endif; ?>
<!-- centro -->
<?php Utils::deleteSession("mensaje"); ?>
<div class="panel-body table-responsive" id="listadoregistros">
    <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <th>Opciones</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Foto</th>
        <th>Estado</th>
        </thead>
        <tbody> 
            <?php while ($row = mysqli_fetch_object($lista)): ?>
                <tr>
                    <td>
                        <a href="<?=base_url?>Usuario/editarUsuario&id=<?=$row->id?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                        <a href="<?=base_url?>Usuario/eliminarUsuario&id=<?=$row->id?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                    </td>
                    <td><?=$row->nombre?></td>
                    <td><?=$row->apellidos?></td>
                    <td><?=$row->usuario?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->rol?></td>
                    <td><img src='<?= base_url ?>images/usuario/<?=$row->imagen?>' height='50px' width='50px' ></td>
                    <td><?php if($row->estado == 1){echo '<span class="label bg-green">Activado</span>';}else{echo '<span class="label bg-red">Desactivado</span>';} ?>
                </tr>
        <?php endwhile; ?>
        </tbody>
        <tfoot>
        <th>Opciones</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Foto</th>
        <th>Estado</th>
        </tfoot>
    </table>
</div>
<?php require_once 'views/layout/footer.php'; ?>

