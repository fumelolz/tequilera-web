
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
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
        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped tablas">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Email</th>
              <th>RFC</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $item = null;
            $valor = null;

            $mostrarClientes = ControladorClientes::ctrMostrarClientes($item,$valor);
            
            foreach ($mostrarClientes as $key => $value) {
              echo '
              <tr>
              <td><center>'.$value["id_persona"].'</center></td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["address"].'</td>
              <td><center>'.$value["mail"].'</center></td>
              <td><center>'.$value["rfc"].'</center></td>
              <td>
              <center>
              <div class="btn-group-sm">

              <button class="btn btn-info btnTelefonoCliente" idCliente="'.$value["id_persona"].'" data-toggle="modal" data-target="#modalVerTelefonoCliente"><i class="fas fa-phone"></i></button>

              <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["id_persona"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fas fa-pencil-alt"></i></button>

              <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id_persona"].'"><i class="fas fa-times"></i></button>
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

  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

<!-- Modal ver Tefono cliente -->
<div class="modal fade" id="modalVerTelefonoCliente" tabindex="-1" role="dialog" aria-labelledby="modalVerTelefonoCliente" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalVerTelefonoCliente">Telefonos de <span class="nCliente"></span></h5>
        </div>

        <style>
            
          .tablerow{
            overflow-x: auto;
          }

        </style>

        <div class="modal-body tablerow">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>id</th>
                <th class="bg-warning">Casa</th>
                <th class="bg-secondary">Celular</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody class="addTelefonos">
            </tbody>           
          </table>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTelefonoCliente">Agregar Telefono</button>
        </div>
        
    </div>
  </div>
</div>

<!-- Modal crear telefono Cliente -->
<div class="modal fade" id="modalAgregarTelefonoCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTelefonoCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-warning" style="color: white;">
          <h5 class="modal-title" id="modalAgregarTelefonoCliente">Agregar telefono Cliente</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el telefono movil del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" name="idClienteTelefono" id="idClienteTelefono">
                <input type="text"  class="form-control" placeholder="Telefono movil del cliente" id="nuevoTelefonoMovil" name="nuevoTelefonoMovil">
              </div>
            </div>

            <!-- Entrada para el telefono de casa del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Telefono de casa del cliente" id="nuevoTelefonoCasa" name="nuevoTelefonoCasa">
              </div>
            </div>


          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $crearTelefonoCliente = new ControladorClientes();
        $crearTelefonoCliente -> ctrCrearTelefonoCliente();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal modificar telefono Cliente -->
<div class="modal fade" id="modalEditarTelefonoCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarTelefonoCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-warning" style="color: white;">
          <h5 class="modal-title" id="modalEditarTelefonoCliente">Editar telefono Cliente</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el telefono movil del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" name="editaridClienteTelefono" id="editaridClienteTelefono">
                <input type="text"  class="form-control" placeholder="Telefono movil del cliente" id="editarTelefonoMovil" name="editarTelefonoMovil">
              </div>
            </div>

            <!-- Entrada para el telefono de casa del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Telefono de casa del cliente" id="editarTelefonoCasa" name="editarTelefonoCasa">
              </div>
            </div>


          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        
        <?php 

        $editarTelefonoCliente = new ControladorClientes();
        $editarTelefonoCliente -> ctrEditarTelefonoCliente();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal crear Cliente -->
<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalAgregarCliente">Agregar Cliente</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Nombre del cliente" id="nuevoNombre" name="nuevoNombre" required>
              </div>
            </div>

            <!-- Entrada para la dirección del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direcciónn del cliente" id="nuevoDireccion" name="nuevoDireccion" required>
              </div>
            </div>
            
            <!-- Entrada para el correo del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="email"  class="form-control" placeholder="Correo electronico del cliente" id="nuevoCorreo" name="nuevoCorreo">
              </div>
            </div>

            <!-- Entrada para el correo del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="RFC" id="nuevoRfc" name="nuevoRfc" maxlength="11" required pattern="[A-Z0-9]+" title="El campo debe conincidir con un rfc Valido">
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $item = null;
        $valor = null;
        $cod = 0;

        $ultimo = ControladorClientes::ctrMostrarPersonas($item,$valor);

        if (!$ultimo) {
          echo 'No hay clientes registrados';
        }else{
          foreach ($ultimo as $key => $value) {
            # code...
          }
          $cod = $value["id_persona"]+1;
        }

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente($cod);

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Cliente -->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalEditarCliente">Editar Cliente</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" id="idCliente" name="idCliente">
                <input type="text"  class="form-control" placeholder="Nombre del cliente" id="editarNombre" name="editarNombre" required>
              </div>
            </div>

            <!-- Entrada para la dirección del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direcciónn del cliente" id="editarDireccion" name="editarDireccion" required>
              </div>
            </div>
            
            <!-- Entrada para el correo del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Correo electronico del cliente" id="editarCorreo" name="editarCorreo">
              </div>
            </div>

            <!-- Entrada para el correo del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="RFC" id="editarRfc" name="editarRfc" required pattern="[A-Z0-9]+" title="El campo debe conincidir con un rfc Valido">
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        
        <?php 

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

        ?>

      </form>
    </div>
  </div>
</div>

<?php 

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

  $eliminarTelefonoCliente = new ControladorClientes();
  $eliminarTelefonoCliente -> ctrEliminarTelefonoCliente();

?>