
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Historial de Ordenes de Producción</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Historial de Ordenes de Producción</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped tablaOrdenProduccion" style="width: 100%;">
          <thead>
            <tr>
              <th style="width: 8px;">#</th>
              <th>Fecha</th>
              <th>Entrega</th>
              <th>Solicitante</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $item = null;
            $valor = null;
            

            $mostrarOrdenes =ControladorOrdenProduccion::ctrMostrarOrdenes($item,$valor);

            foreach ($mostrarOrdenes as $key => $value) {

              $item2 = "id_usuario";
              $valor2 = $value["solicitante"];

              $solicitante = ControladorUsuarios::ctrMostrarUsuarios($item2,$valor2);
              $estado = $value["estado"];

              echo ' 
              <tr> 
              <td>'.$value["id_orden_produccion"].'</td>
              <td>'.$value["fecha"].'</td>
              <td>'.$value["fecha_entrega"].'</td>
              <td>'.$solicitante["nombre"].'</td>
              <td><center>';

              if ($estado == 0) {
                
              }

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

              echo '</center></td></tr>

              ';
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
