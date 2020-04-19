
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
            <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarAlmacen">Agregar Almacen</button>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped tablas">
              <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Tipo</th>
                  <th>Encargado</th>
                  <th>Acciones</th>
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
                  <td><center>'.$mostrarEncargado["usuario"].'</center></td>
                  <td>
                  <center>
                  <div class="btn-group-sm">
                  <button class="btn btn-warning btnEditarAlmacen" data-toggle="modal" data-target="#modalEditarAlmacen"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger btnEliminarAlmacen"><i class="fas fa-times"></i></button>
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
            <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarTipoAlmacen">Agregar tipo de Almacen</button>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped tablas">
              <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
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
                  <button class="btn btn-warning btnEditarAlmacen" data-toggle="modal" data-target="#modalEditarAlmacen"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger btnEliminarAlmacen"><i class="fas fa-times"></i></button>
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