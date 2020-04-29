
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pedidos al proveedor</h1> 
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Pedidos al proveedor</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-5 col-sm-12">
        <div class="bg-success" style="height: 4px;"></div>
        <div class="card">
          <div class="card-body p-2">


            <form method="POST">

              <div class="row d-flex justify-content-between">
                <div class="form-group col-md-3">
                  <?php 
                  
                  $item = null;
                  $valor = null;

                  $pedidos = ControladorPedidosProveedor::ctrMostrarPedidosProveedores($item,$valor);
                  
                  if (!$pedidos) {
                    $id_pedido = 1;
                  }else{

                    foreach ($pedidos as $key => $value) {}

                      $id_pedido = $value["id_pedido"]+1;

                  }

                  ?>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div> 
                    <input type="text" class="form-control" id="nuevoIdPedido" name="nuevoIdPedido" value="<?php echo $id_pedido; ?>" required readonly>
                  </div>
                </div>

                <?php 

                date_default_timezone_set('America/Mexico_City');

                $date = date('Y-m-d');
                $time = date('H:i:s');

                ?>
                <div class="form-group col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nuevoFecha" name="nuevoFecha" value="<?php echo $date; ?>" required readonly>
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Solicitante:</i></span>
                  </div>
                  <input type="hidden"id="nuevoSolicitante" name="nuevoSolicitante" value="<?php echo $_SESSION["id_usuario"]; ?>" required readonly>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"]; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                  </div>
                  <select class="form-control" name="nuevoProveedor" id="nuevoProveedor" required>
                    <option value="">Selecciónar Proveedor</option>
                    <?php 
                    
                    $item = null;
                    $valor = null;

                    $proveedores = ControladorProveedores::ctrMostrarProveedores($item,$valor);

                    foreach ($proveedores as $key => $value) {
                      echo '<option value="'.$value["id_proveedor"].'">'.$value["nombre"].'</option>';
                    }

                    ?>
                  </select>
                </div>
              </div> 
              
              <hr>

              <div class="mb-3"><h4 >Lista de productos</h4></div>

              <div class="form-group nuevoProducto"></div>

              <hr>

              <input type="hidden" id="listaProductos" name="listaProductos">

              <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-success">Crear Orden</button>
              </div>
              <?php 

              $crearPedidoProveedor = new ControladorPedidosProveedor();
              $crearPedidoProveedor -> ctrCrearPedidoProveedor();

              ?>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-7 col-sm-12">
        <div class="bg-warning" style="height: 4px;"></div>
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-striped tablaPedidoProveedor" style="width: 100%;">
              <thead>
                <tr>
                  <th style="width: 8px;">#</th>
                  <th>Descripción</th>
                  <th style="width: 10px;">Presentación</th>
                  <th>Stock</th>
                  <th>Acciónes</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Botella de vidrio</td>
                  <td>Caja</td>
                  <td>16</td>
                  <td>Botones</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
