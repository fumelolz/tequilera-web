
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proveedores</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
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
        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarProveedor">Agregar Proveedor</button>
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

            $mostrarProveedores = ControladorProveedores::ctrMostrarProveedores($item,$valor);
            
            foreach ($mostrarProveedores as $key => $value) {
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

              <button class="btn btn-info btnTelefonoProveedor" idProveedor="'.$value["id_persona"].'" data-toggle="modal" data-target="#modalVerTelefonoCliente"><i class="fas fa-phone"></i></button>

              <button class="btn btn-warning btnEditarProveedor" idProveedor="'.$value["id_persona"].'" data-toggle="modal" data-target="#modalEditarProveedor"><i class="fas fa-pencil-alt"></i></button>

              <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id_persona"].'"><i class="fas fa-times"></i></button>

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
        <h5 class="modal-title" id="modalVerTelefonoCliente">Telefonos de <span class="nProveedor badge badge-info"></span></h5>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTelefonoProveedor">Agregar Telefono</button>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal crear telefono Proveedor -->
<div class="modal fade" id="modalAgregarTelefonoProveedor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTelefonoProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-warning" style="color: white;">
          <h5 class="modal-title" id="modalAgregarTelefonoProveedor">Agregar telefono Proveedor</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el telefono movil del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" name="idProveedorTelefono" id="idProveedorTelefono">
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

        $crearTelefonoProveedor = new ControladorProveedores();
        $crearTelefonoProveedor -> ctrCrearTelefonoProveedor();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal modificar telefono Cliente -->
<div class="modal fade" id="modalEditarTelefonoProveedor" tabindex="-1" role="dialog" aria-labelledby="modalEditarTelefonoProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-warning" style="color: white;">
          <h5 class="modal-title" id="modalEditarTelefonoProveedor">Editar telefono Proveedor</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el telefono movil del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" name="editaridProveedorTelefono" id="editaridProveedorTelefono">
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

        $editarTelefonoProveedores = new ControladorProveedores();
        $editarTelefonoProveedores -> ctrEditarTelefonoProveedor();

        ?>

      </form>
    </div>
  </div>
</div>


<!-- Modal crear Proveedor -->
<div class="modal fade" id="modalAgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalAgregarProveedor">Agregar Proveedor</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Nombre del Proveedor" id="nuevoNombre" name="nuevoNombre" required>
              </div>
            </div>

            <!-- Entrada para la dirección del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direcciónn del Proveedor" id="nuevoDireccion" name="nuevoDireccion" required>
              </div>
            </div>
            
            <!-- Entrada para el correo del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="email"  class="form-control" placeholder="Correo electronico del Proveedor" id="nuevoCorreo" name="nuevoCorreo">
              </div>
            </div>

            <!-- Entrada para el correo del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="RFC" id="nuevoRfc" name="nuevoRfc" maxlength="11" required pattern="[A-Z0-9]+" title="El campo debe conincidir con un rfc Valido" style="text-transform: uppercase;">
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
          echo 'No hay Proveedors registrados';
        }else{
          foreach ($ultimo as $key => $value) {
            # code...
          }
          $cod = $value["id_persona"]+1;
        }

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedor($cod);

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Proveedor -->
<div class="modal fade" id="modalEditarProveedor" tabindex="-1" role="dialog" aria-labelledby="modalEditarProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalEditarProveedor">Editar Proveedor</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" id="idProveedor" name="idProveedor">
                <input type="text"  class="form-control" placeholder="Nombre del Proveedor" id="editarNombre" name="editarNombre" required>
              </div>
            </div>

            <!-- Entrada para la dirección del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direcciónn del Proveedor" id="editarDireccion" name="editarDireccion" required>
              </div>
            </div>
            
            <!-- Entrada para el correo del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="email"  class="form-control" placeholder="Correo electronico del Proveedor" id="editarCorreo" name="editarCorreo">
              </div>
            </div>

            <!-- Entrada para el correo del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="RFC" id="editarRfc" name="editarRfc" style="text-transform: uppercase;">
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        
        <?php 

        $editarProveedor = new ControladorProveedores();
        $editarProveedor -> ctrEditarProveedor();

        ?>

      </form>
    </div>
  </div>
</div>


<?php 
  
  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrEliminarProveedor();

  $eliminarTelefonoProveedor = new ControladorProveedores();
  $eliminarTelefonoProveedor -> ctrEliminarTelefonoProveedor();

 ?>