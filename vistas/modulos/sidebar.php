<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="vistas/index3.html" class="brand-link">
    <img src="vistas/dist/img/AdminLTELogo.png"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Sagrado Agave</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php
        if($_SESSION["foto"]){
          echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">';
        }else{
          echo '<img src="vistas/img/default/anonymous.png" class="img-circle elevation-2" alt="User Image">';
        } 
        ?>
      </div>
      <div class="info">
        <a class="d-block">
          <?php 
          if ($_SESSION["usuario"]) {
            echo ucfirst($_SESSION["usuario"]);
          }else{
            echo 'Usuario Anonimo';
          } 
          ?></a> 
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fas fa-shopping-cart nav-icon"></i>
              <p>
                Control de Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="crear-venta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Venta</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fas fa-user nav-icon"></i>
              <p>
                Control de Registros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Control Proveedores
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="proveedores" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Proveedores</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pedidos-proveedor" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Pedidos</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fab fa-product-hunt nav-icon"></i>
              <p>
                Control de Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="productos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="orden-produccion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orden de Producción</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="historial-orden-produccion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historial de Ordenes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fas fa-warehouse nav-icon"></i>
              <p>
                Control de Almacenes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="almacenes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Almacenes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="insumos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insumos</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>