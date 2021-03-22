<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url?>/Usuario/dashboard" class="brand-link">
      <img src="../assets/dist/img/logo2.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Farmacia Goliat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/usuario_farma.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['identity']->nombre_usu?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?=base_url?>Usuario/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- MENU ACCESO -->
          <?php if(isset($_SESSION['admin']) && $_SESSION['admin']==true): ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  <!-- <i class="icon-people"></i> --> Acceso  
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="<?=base_url?>Usuario/listarUsuarios" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url?>Usuario/agregarUsuario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registrar Usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url?>Usuario/listarRoles" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Roles</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>

          <!-- MENU CLIENTES -->
          <?php if(isset($_SESSION['admin'])  ||  isset($_SESSION['vendedor'])): ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  <!-- <i class="icon-people"></i> --> Clientes  
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="<?=base_url?>Cliente/index" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado</p>
                  </a>
                </li>
                <?php if(isset($_SESSION['admin']) ): ?>
                <li class="nav-item">
                  <a href="<?=base_url?>Cliente/registroCliente" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registrar</p>
                  </a>
                </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- MENU PRODUCTOS -->
          <?php if(isset($_SESSION['admin'])  ||  isset($_SESSION['vendedor'])): ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
                <p>
                  <!-- <i class="icon-people"></i> --> Productos  
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="<?=base_url?>Producto/index" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado</p>
                  </a>
                </li>
                <?php if(isset($_SESSION['admin']) ): ?>
                <li class="nav-item">
                  <a href="<?=base_url?>Producto/registrarProducto" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registrar</p>
                  </a>
                </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- MENU VENTAS -->
          <?php if(isset($_SESSION['admin'])  ||  isset($_SESSION['vendedor'])): ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  <!-- <i class="icon-people"></i> --> Ventas  
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
              <li class="nav-item">
                  <a href="<?=base_url?>Venta/registrar_venta" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nueva Venta</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url?>Venta/listar_ventas&id=0" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Ventas</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>

          <!--REPORTES-->
          <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==true): ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Reportes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url?>Venta/listar_ventas&id=1" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte Ventas</p>
                  </a>
                </li>
                <!-- 
                <li class="nav-item">
                  <a href="reporte/reporte(error-prueba)" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte Clientes</p>
                  </a>
                </li>
                -->
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>