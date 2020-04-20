
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Almacenes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Almacenes</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title pt-2">Almacenes</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlmacen"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped tablas">
              <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th><center>Tipo</center></th>
                  <th><center>Encargado</center></th>
                  <th><center>Acciones</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $item = null;
                $valor = null;

                $mostrarAlmacenes = ControladorAlmacenes::ctrMostrarAlmacenes($item,$valor);

                foreach ($mostrarAlmacenes as $key => $value) {
              // Tipo de almacen
                  $item2 = "id_tipo_almacen";
                  $valor2 = $value["tipo"];

              // Tipo de almacen
                  $item3 = "id_usuario";
                  $valor3 = $value["encargado"];

                  $mostrarTipoAlmacen = ControladorAlmacenes::ctrMostrarTipoAlmacen($item2,$valor2);

                  $mostrarEncargado = ControladorUsuarios::ctrMostrarUsuarios($item3,$valor3);

                  echo '
                  <tr>
                  <td><center>'.$value["id_almacen"].'</center></td>
                  <td><center>'.$mostrarTipoAlmacen["tipo"].'</center></td>
                  <td><center>'.$mostrarEncargado["nombre"].'</center></td>
                  <td>
                  <center>
                  <div class="btn-group-sm">
                  <button class="btn btn-warning btnEditarAlmacen" idAlmacen="'.$value["id_almacen"].'" data-toggle="modal" data-target="#modalEditarAlmacen"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger btnEliminarAlmacen" idAlmacen="'.$value["id_almacen"].'"><i class="fas fa-times"></i></button>
                  </div>
                  </center>
                  </td>
                  </tr>';
                }


                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
  
      <div class="col-md-6 col-sm-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title pt-2">Tipo de Almacen</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipoAlmacen"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped tablas">
              <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th class="text-center">Tipo</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                // Tipo de almacen
                  $item2 = null;
                  $valor2 = null;
                  $mostrarTipoAlmacen = ControladorAlmacenes::ctrMostrarTipoAlmacen($item2,$valor2);

                foreach ($mostrarTipoAlmacen as $key => $value) {

                  echo '
                  <tr>
                  <td><center>'.$value["id_tipo_almacen"].'</center></td>
                  <td><center>'.$value["tipo"].'</center></td>
                  <td>
                  <center>
                  <div class="btn-group-sm">
                  <button class="btn btn-warning btnEditarTipoAlmacen" idTipoAlmacen="'.$value["id_tipo_almacen"].'" data-toggle="modal" data-target="#modalEditarTipoAlmacen"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger btnEliminarTipoAlmacen" idTipoAlmacen="'.$value["id_tipo_almacen"].'"><i class="fas fa-times"></i></button>
                  </div>
                  </center>
                  </td>
                  </tr>';
                }


                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal crear Almacen -->
<div class="modal fade" id="modalAgregarAlmacen" tabindex="-1" role="dialog" aria-labelledby="modalAgregarAlmacen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="modalAgregarAlmacen">Agregar Almacen</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el tipo de almacen -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <select class="form-control" name="nuevoTipoAlmacen" id="nuevoTipoAlmacen" required>
                  <option value="">Selecciónar tipo de almacen</option>
                  <?php 

                  $item = null;
                  $valor = null;

                  $mostrarTipoAlmacen = ControladorAlmacenes::ctrMostrarTipoAlmacen($item,$valor);

                  foreach ($mostrarTipoAlmacen as $key => $value) {
                    echo '<option value="'.$value["id_tipo_almacen"].'">'.$value["tipo"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div> 

            <!-- Entrada para el encargado del almacen -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <select class="form-control" name="nuevoEncargado" id="nuevoEncargado" required>
                  <option value="">Selecciónar al encargado</option>
                  <?php 

                  $item = null;
                  $valor = null;

                  $mostrarUsuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

                  foreach ($mostrarUsuarios as $key => $value) {
                    echo '<option value="'.$value["id_usuario"].'">'.$value["nombre"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $crearAlmacen = new ControladorAlmacenes();
        $crearAlmacen -> ctrCrearAlmacen();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Almacen -->
<div class="modal fade" id="modalEditarAlmacen" tabindex="-1" role="dialog" aria-labelledby="modalEditarAlmacen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="modalEditarAlmacen">Editar Almacen</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el tipo de almacen -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="hidden" id="idAlmacen" name="idAlmacen">
                <select class="form-control" name="editarTipoAlmacen" required>
                  <option value="" id="editarTipoAlmacen">Selecciónar tipo de almacen</option>
                  <?php 

                  $item = null;
                  $valor = null;

                  $mostrarTipoAlmacen = ControladorAlmacenes::ctrMostrarTipoAlmacen($item,$valor);

                  foreach ($mostrarTipoAlmacen as $key => $value) {
                    echo '<option value="'.$value["id_tipo_almacen"].'">'.$value["tipo"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div> 

            <!-- Entrada para el encargado del almacen -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <select class="form-control" name="editarEncargado"  required>
                  <option value="" id="editarEncargado">Selecciónar al encargado</option>
                  <?php 

                  $item = null;
                  $valor = null;

                  $mostrarUsuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

                  foreach ($mostrarUsuarios as $key => $value) {
                    echo '<option value="'.$value["id_usuario"].'">'.$value["nombre"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $editarAlmacen = new ControladorAlmacenes();
        $editarAlmacen -> ctrEditarAlmacen();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Tipo Almacen -->
<div class="modal fade" id="modalAgregarTipoAlmacen" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTipoAlmacen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="modalAgregarTipoAlmacen">Agregar Tipo de Almacen</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el tipo de almacen -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="text" class="form-control" id="nuevoTipo" name="nuevoTipo" placeholder="Nombre del tipo de almacen">
              </div>
            </div> 


          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $editarTipoAlmacen = new ControladorAlmacenes();
        $editarTipoAlmacen -> ctrCrearTipoAlmacen();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Tipo Almacen -->
<div class="modal fade" id="modalEditarTipoAlmacen" tabindex="-1" role="dialog" aria-labelledby="modalEditarTipoAlmacen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="modalEditarTipoAlmacen">Editar Tipo de Almacen</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el tipo de almacen -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                </div>
                <input type="hidden" name="editarIdTipoAlmacen" id="editarIdTipoAlmacen">
                <input type="text" class="form-control" id="editarTipo" name="editarTipo" placeholder="Nombre del tipo de almacen">
              </div>
            </div> 


          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $editarTipoAlmacen = new ControladorAlmacenes();
        $editarTipoAlmacen -> ctrEditarTipoAlmacen();

        ?>

      </form>
    </div>
  </div>
</div>

<?php 
  
$eliminarAlmacen = new ControladorAlmacenes();
$eliminarAlmacen -> ctrEliminarAlmacen();

$eliminarTipoAlmacen = new ControladorAlmacenes();
$eliminarTipoAlmacen -> ctrEliminarTipoAlmacen();

?>