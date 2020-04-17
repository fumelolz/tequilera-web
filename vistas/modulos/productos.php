
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Productos</li>
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
        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped tablaProductos" style="width: 100%;">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Descripción</th>
              <th>Presentación</th>
              <th>Precio</th>
              <th>Stock</th>
              <th>Foto</th>
              <th>Acciónes</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Crear Producto -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProducto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalAgregarProducto">Agregar Producto</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para la descripción del producto -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Descripción del producto" id="nuevoDescripcion" name="nuevoDescripcion" required>
              </div>
            </div>

            <!-- Entrada para la presentación del producto -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Presentación del producto" name="nuevoPresentacion" id="nuevoPresentacion" required>
              </div>
            </div>
            
            <!-- Entrada para el precio del producto -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="pass"  class="form-control" placeholder="Precio del producto" name="nuevoPrecio" id="nuevoPrecio" required>
              </div>
            </div>
            
            <!-- Entrada para la foto del producto -->
            <div class="form-group">
              <label for="customFile">Foto del producto</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="nuevoFoto" name="nuevoFoto" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <small id="passwordHelpBlock" class="form-text text-muted">
                La imagen debe de pesar menos de 2Mb 
              </small>
              <br>
              <img src="vistas/img/default/noimage.png" class="img-thumbnail prevImageAgregar" width="100px" >
            </div> 

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $crearProducto = new ControladorProductos();
        $crearProducto -> ctrCrearProducto();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Producto -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="modalEditarProducto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalEditarProducto">Editar Producto</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para la descripción del producto -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <input type="hidden" id="editarIdProducto" name="editarIdProducto"> 
                <input type="text"  class="form-control" placeholder="Descripción del producto" id="editarDescripcion" name="editarDescripcion" readonly>
              </div>
            </div>

            <!-- Entrada para la presentación del producto -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Presentación del producto" name="editarPresentacion" id="editarPresentacion" required>
              </div>
            </div>
            
            <!-- Entrada para el precio del producto -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="pass"  class="form-control" placeholder="Precio del producto" name="editarPrecio" id="editarPrecio" required>
              </div>
            </div>
            
            <!-- Entrada para la foto del producto -->
            <div class="form-group">
              <label for="customFile">Foto del producto</label>
              <div class="custom-file">
                <input type="hidden" id="editarFotoActual" name="editarFotoActual">
                <input type="file" class="custom-file-input" id="editarFoto" name="editarFoto">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <small id="passwordHelpBlock" class="form-text text-muted">
                La imagen debe de pesar menos de 2Mb 
              </small>
              <br>
              <img src="vistas/img/default/noimage.png" class="img-thumbnail prevImageEditar" width="100px" >
            </div> 

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        <?php 

        $editarProducto = new ControladorProductos();
        $editarProducto -> ctrEditarProducto();

        ?>

      </form>
    </div>
  </div>
</div>

<?php 
  
  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>
