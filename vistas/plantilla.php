<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sagrado Agave</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css perzonalizado -->
  <link rel="stylesheet" href="vistas/css/jquery.datetimepicker.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.css">

  <!-- SweetAlert -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.css">
  <!-- SweetAlert -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>
<body class="hold-transition sidebar-mini sidebar-collapse <?php if(isset($_SESSION["logged"])){}else{echo 'login-page';} ?>">

  <?php 
  if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "ok"){

    echo '
    <!-- Site wrapper -->
    <div class="wrapper">';

    include "modulos/navbar.php";

    include "modulos/sidebar.php";

    if (isset($_GET["ruta"])) {
      if ($_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "logout" ||
        $_GET["ruta"] == "home" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "proveedores" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "almacenes" ||
        $_GET["ruta"] == "orden-produccion" ||
        $_GET["ruta"] == "historial-orden-produccion" ||
        $_GET["ruta"] == "insumos" ||
        $_GET["ruta"] == "pedidos-proveedor") {
         // Content
        include "modulos/".$_GET["ruta"].".php"; 
    }else{
      include "modulos/404.php";
    }
  }else{
    include "modulos/home.php";
  }


  include "modulos/footer.php";

  echo '
  </div>
  <!-- ./wrapper -->';


}else{
  //login
  include "modulos/login.php";
}



?>

  



<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<script src="vistas/js/jquery.datetimepicker.full.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="vistas/plugins/datatables/jquery.dataTables.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.js"></script>

<!-- Js Perzonalizado -->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/moment.js"></script>
<?php 

if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "ok"){

  if (isset($_GET["ruta"])) {
    if ($_GET["ruta"] == "usuarios" ||
      $_GET["ruta"] == "clientes" ||
      $_GET["ruta"] == "productos" ||
      $_GET["ruta"] == "proveedores" ||
      $_GET["ruta"] == "crear-venta" ||
      $_GET["ruta"] == "almacenes" ||
      $_GET["ruta"] == "orden-produccion" ||
      $_GET["ruta"] == "historial-orden-produccion" ||
      $_GET["ruta"] == "insumos" ||
      $_GET["ruta"] == "pedidos-proveedor") {
      
      echo '<script src="vistas/js/'.$_GET["ruta"].'.js"></script>';
  }
}
}

?>


</body>
</html>
