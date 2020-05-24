<?php 

setlocale(LC_ALL,"es_MX");

$mes = date("m");
$anio = date("Y");
$ordenes =  ControladorOrdenProduccion::ctrNuevasOrdenes();

$ventaTotal = ControladorVentas::ctrMostrarVentasTotales();

$ventaMes = ControladorVentas::ctrMostrarVentasMes();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sagrado Agave</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Home Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Ordenes de producción</span>
            <span class="info-box-number">
              <?php echo $ordenes; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Ventas Totales</span>
            <span class="info-box-number"><?php echo $ventaTotal; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">
              Total de ventas <?php echo ucwords(strftime("%B %G",strtotime($anio.'-'.$mes))); ?></span>
              <span class="info-box-number"><?php echo $ventaMes["ventas"]; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventas <?php echo ucwords(strftime("%B %G",strtotime($anio.'-'.$mes)));?></span>
              <span class="info-box-number"><?php echo '$' . number_format($ventaMes["totalVentas"], 2); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Ventas por mes</h3>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" width="200" height="200"></canvas>
                </div>
              </div>
              <!-- /.card -->
            </div>
            
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Productos más vendidos</h3>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="productosMasVendidos" width="200" height="200"></canvas>
                </div>
              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
