
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transferencia de Insumos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Transferencia de Insumos</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarInsumo">Crear Transferencia</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped tablaInsumos" style="width: 100%;">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Movimiento</th>
              <th>Almacen</th>
              <th>Estado</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $item = null;
            $valor = null;

            $mostrarTransInsumos = ControladorTransfeInsumos::ctrMostrarTransfeInsumos($item,$valor); 

            foreach ($mostrarTransInsumos as $key => $value) {

              $item2 = "id_tipo_almacen";
              $valor2 = $value["almacen"];

              $almacen = ControladorAlmacenes::ctrMostrarTipoAlmacen($item2,$valor2);

              $item3 = "id_clasificacion";
              $valor3 = $value["movimiento"];

              $movimiento = ControladorTransfeInsumos::ctrMostrarTipoMovimiento($item3,$valor3); 

              $estado = $value["estado"];

              echo '
              <tr>
              <td><center>'.$value["id_transf_insumo"].'</center></td>
              <td><center>'.$value["fecha"].'</center></td>
              <td><center>'.$value["hora"].'</center></td>
              <td><center>'.$movimiento["descripcion"].'</center></td>
              <td><center>'.$almacen["tipo"].'</center></td>
              <td><center>'; 

              switch ($estado) {
                case 0:
                  echo '<button class="btn btn-flat btn-danger">Cancelado</button>';
                  break;
                case 1:
                  echo '<button class="btn btn-flat btn-warning">En progreso</button>';
                  break;
                case 2:
                  echo '<button class="btn btn-flat btn-success">Completado</button>';
                  break;
              }


              echo '</center></td>
              <td><center>
              <div class="btn-group-sm">
              <button class="btn btn-secondary btnImprimir" idTransInsumo="'.$value["id_transf_insumo"].'">Imprimir</button> 
              </div>
              </center></td>
              </tr>';

            }

            
            ?>
            
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal crear Insumo -->
<div class="modal fade" id="modalAgregarInsumo" tabindex="-1" role="dialog" aria-labelledby="modalAgregarInsumo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="modalAgregarInsumo">Agregar Insumo</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para la descripcion del insumo -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="text" class="form-control" name="nuevoDescripcionInsumo" id="nuevoDescripcionInsumo" placeholder="Descripcion del insumo">
              </div>
            </div> 

            <!-- Entrada para la unidad del insumo -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <select class="form-control" name="nuevoUnidad" id="nuevoUnidad" required>
                  <option value="">Selecciónar la unidad</option>
                  <?php 

                  $item = null;
                  $valor = null;
                  $unidad = ControladorInsumos::ctrMostrarTipoUnidad($item,$valor);

                  foreach ($unidad as $key => $value) {
                    echo '<option value="'.$value["id_unidad"].'">'.$value["unidad"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div>

            <!-- Entrada para la cantidad del insumo -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="number" class="form-control" name="nuevoCantidad" id="nuevoCantidad" placeholder="Cantidad de unidades">
              </div>
            </div> 

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $crearInsumo = new ControladorInsumos();
        $crearInsumo -> ctrCrearInsumo();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Insumo -->
<div class="modal fade" id="modalEditarInsumo" tabindex="-1" role="dialog" aria-labelledby="modalEditarInsumo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="modalEditarInsumo">Editar Insumo</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para la descripcion del insumo -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="hidden" name="idInsumo" id="idInsumo">
                <input type="text" class="form-control" name="editarDescripcionInsumo" id="editarDescripcionInsumo" placeholder="Descripcion del insumo">
              </div>
            </div> 

            <!-- Entrada para la unidad del insumo -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <select class="form-control" name="editarUnidad" required>
                  <option value="" id="editarUnidad">Selecciónar la unidad</option>
                  <?php 

                  $item = null;
                  $valor = null;
                  $unidad = ControladorInsumos::ctrMostrarTipoUnidad($item,$valor);

                  foreach ($unidad as $key => $value) {
                    echo '<option value="'.$value["id_unidad"].'">'.$value["unidad"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div>

            <!-- Entrada para la cantidad del insumo -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="number" class="form-control" name="editarCantidad" id="editarCantidad" placeholder="Cantidad de unidades">
              </div>
            </div> 

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $editarInsumo = new ControladorInsumos();
        $editarInsumo -> ctrEditarInsumo();

        ?>

      </form>
    </div>
  </div>
</div>

<?php 

$eliminarInsumo = new ControladorInsumos();
$eliminarInsumo -> ctrEliminarInsumo();

 ?>