
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Ventas</li>
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

              <div class="row">
                <div class="form-group col-md-3">
                  <?php 

                  $item = null;
                  $valor = null;

                  $ventas = ControladorCrearVenta::ctrMostrarVentas($item,$valor);   

                  if (!$ventas) {
                    $id_venta = 1;
                  }else{
                    foreach ($ventas as $key => $value) {

                    }
                    $id_venta = $value["id_venta"]+1;
                  }

                  ?>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div> 
                    <input type="text" class="form-control" id="nuevoId" name="nuevoId" value="<?php echo $id_venta; ?>" required readonly>
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="hidden"id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["id_usuario"]; ?>" required readonly>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"]; ?>" readonly>
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Buscar Cliente</span>
                  </div>
                  <input type="text" class="form-control">
                </div>
                <div class="livesearch"></div>
              </div> -->

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                  </div>
                  <select class="form-control" name="nuevoCliente" id="nuevoCliente" required>
                    <option value="">Selecciónar cliente</option>
                    <?php 
                    
                    $item = null;
                    $valor = null;

                    $clientes = ControladorClientes::ctrMostrarClientes($item,$valor);

                    foreach ($clientes as $key => $value) {
                      echo '<option value="'.$value["id_cliente"].'">'.$value["nombre"].'</option>';
                    }

                    ?>
                  </select>
                </div>
              </div> 

              <div class="row">
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
                <div class="form-group col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nuevoHora" name="nuevoHora" value="" required readonly>
                  </div>
                </div>

              </div>

              <hr>

              <div class="mb-3"><h4 >Lista de productos</h4></div>

              <div class="form-group nuevoProducto"></div>
              
              <hr>

              <div class="row">
                <div class="col-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>IVA</th>
                        <th>SubTotal</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 33.333333%">
                          <div class="input-group">
                            <input type="number" min="0" class="form-control" id="nuevoIva" name="nuevoIva" value="16" required>
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-percent"></i></span>
                            </div>
                          </div>
                        </td>
                        <td style="width: 33.333333%">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="text" class="form-control" total="" id="nuevoSubTotalVenta" name="nuevoSubTotalVenta" required readonly>
                          </div>
                        </td>
                        <td style="width: 33.333333%">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="hidden" id="listaProductos" name="listaProductos" value="">
                            <input type="text" class="form-control" total="" id="nuevoTotalVenta" name="nuevoTotalVenta" value="" required readonly>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            
            <div class="card-footer d-flex justify-content-end">
              <button type="submit" class="btn btn-lg btn-success btnCrearVenta"  >Crear Venta</button>
            </div>
            <?php 

            $crearVenta = new ControladorCrearVenta();
            $crearVenta -> ctrCrearVenta();

            ?>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-7 col-sm-12">
      <div class="bg-warning" style="height: 4px;"></div>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered table-striped tablaVentas" style="width: 100%;">
            <thead>
              <tr>
                <th style="width: 8px;">#</th>
                <th>Descripción</th>
                <th style="width: 10px;">Presentación</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Foto</th>
                <th>Acciónes</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
