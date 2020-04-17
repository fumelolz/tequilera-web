
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
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
        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped tablas">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Estado</th>
              <th>Nivel de Acceso</th>
              <th>Ultimo Login</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $item = null;
            $valor = null;

            $mostrarUsuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
            
            foreach ($mostrarUsuarios as $key => $value) {
              echo '
              <tr>
              <td>'.$value["id_usuario"].'</td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["usuario"].'</td>';

              if($value["img"]){
                echo '<td><center><img src="'.$value["img"].'" class="img-thumbnail" width="40px"></center></td>';
              }else{
                echo '<td><center><img src="vistas/img/default/anonymous.png" class="img-thumbnail" width="40px"></center></td>';
              } 

              if($value["estado"] == 1){
                echo '<td><center><button class="btn btn-success btn-sm btnActivate" estado="0" idUsuario="'.$value["id_usuario"].'">Activado</button></center></td>';
              }else{
               echo '<td><center><button class="btn btn-danger btn-sm btnActivate" estado="1" idUsuario="'.$value["id_usuario"].'">Desactivado</button></center></td>';
             }

             echo' 
             <td><center>'.$value["tipo"].'</center></td>
             <td><center><span class="reloj">'.$value["ultimo_login"].'</span></center></td>
             <td>
             <center>
             <div class="btn-group-sm">
             <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>
             <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id_usuario"].'" foto="'.$value["img"].'" usuario="'.$value["usuario"].'"><i class="fas fa-times"></i></button>
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

<!-- Modal crear Usuario -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalAgregarUsuario">Agregar Usuario</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Nombre del empleado" id="nuevoNombre" name="nuevoNombre" required>
              </div>
            </div>

            <!-- Entrada Para el nombre de usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Nombre de usuario para el empleado" name="nuevoUsuario" id="nuevoUsuario" required>
                <div class="invalid-feedback" id="userfail">
                  Usuario ya registrado
                </div>
              </div>
            </div>
            
            <!-- Entrada Para la contraseña del usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="pass"  class="form-control" placeholder="Contraseña" name="nuevoPass" id="nuevoPass" required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  La contraseña debe de ser mayor a 5 caracteres, puede llevar caracteres especiales
                </small>
              </div>
            </div>
            
            <!-- Entrada para el nivel de acceso del usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <select name="nuevoTipo" id="nuevoTipo" class="form-control">
                  <?php 

                    $item = null;
                    $valor = null;

                    $tipoUsuario = ControladorUsuarios::ctrMostrarTipoUsuarios($item,$valor);
                    
                    foreach ($tipoUsuario as $key => $value) {
                      echo '<option value="'.$value["id_tipo_usuario"].'">'.$value["tipo"].'</option>';
                    }

                   ?>
                </select>
              </div>
            </div>

            <!-- Entrada para la foto de perfil -->
            <div class="form-group">
              <label for="customFile">Foto de perfil</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="nuevoFoto" name="nuevoFoto" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <small id="passwordHelpBlock" class="form-text text-muted">
                La imagen debe de pesar menos de 2Mb 
              </small>
              <br>
              <img src="vistas/img/default/anonymous.png" class="img-thumbnail prevImageAgregar" width="100px" >
            </div> 

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal editar Usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalEditarUsuario">Editar Usuario</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" id="editarId" name="editarId">
                <input type="text"  class="form-control" placeholder="Nombre del empleado" id="editarNombre" name="editarNombre" required>
              </div>
            </div>

            <!-- Entrada Para el nombre de usuario -->
            <div class="form-group">
              <small id="passwordHelpBlock" class="form-text text-muted">
                  El nombre usuario no puede ser editado
                </small>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Nombre de usuario para el empleado" name="editarUsuario" id="editarUsuario" readonly>
              </div>
            </div>
            
            <!-- Entrada Para la contraseña del usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="hidden" id="editarPassActual" name="editarPassActual">
                <input type="pass"  class="form-control" placeholder="Contraseña" name="editarPass" id="editarPass">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  La contraseña debe de ser mayor a 5 caracteres, puede llevar caracteres especiales
                </small>
              </div>
            </div>
            
            <!-- Entrada para el nivel de acceso del usuario -->
            <div class="form-group">
              <small id="passwordHelpBlock" class="form-text text-muted">
                  Si no desea editar tipo de usuario no elegir
                </small>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <select name="editarTipo" class="form-control">
                  <option id="editarTipo">Elegir tipo de usuario</option>
                  <?php 

                    $item = null;
                    $valor = null;

                    $tipoUsuario = ControladorUsuarios::ctrMostrarTipoUsuarios($item,$valor);
                    
                    foreach ($tipoUsuario as $key => $value) {
                      echo '<option value="'.$value["id_tipo_usuario"].'">'.$value["tipo"].'</option>';
                    }

                   ?>
                </select>
              </div>
            </div>

            <!-- Entrada para la foto de perfil -->
            <div class="form-group">
              <label for="customFile">Foto de perfil</label>
              <div class="custom-file">
                <input type="hidden" id="editarFotoActual" name="editarFotoActual">
                <input type="file" class="custom-file-input" id="editarFoto" name="editarFoto">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <small id="passwordHelpBlock" class="form-text text-muted">
                La imagen debe de pesar menos de 2Mb 
              </small>
              <br>
              <img src="vistas/img/default/anonymous.png" class="img-thumbnail prevImageEditar" width="100px" >
            </div> 

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrEditarUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

<?php 
  
  $eliminarUsuario = new ControladorUsuarios();
  $eliminarUsuario -> ctrEliminarUsuario();

 ?>