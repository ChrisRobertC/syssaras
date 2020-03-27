<!DOCTYPE html>
<html>
<head>
  <?php 
    session_start();

    if($_SESSION==true){
      //echo $_SESSION['user'];
      //echo "si existe";
      $path='../../';
    }else{
      header('location: ../../View/Account/Login.php');
    }

/*    if($_SESSION==TRUE){
      $path="../../";
    }
    else{
      echo "<script>alert('Cerrando session')</script>"+  header('location: ../../view/Account/Login.php');
    }
    */

   ?>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <title>SIS SARAS</title>

   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   <link rel="icon" href="../../assests/Menu2/img/plantilla/icono-negro.ico">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../assests/Menu2/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../../assests/Menu2/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../assests/Menu2/plugins/iCheck/all.css">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="../../assests/Menu2/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../../assests/alertifyjs/css/alertify.css" >
  <link rel="stylesheet" href="../../assests/select2/css/select2.min.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="../../assests/Menu2/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="../../assests/Menu2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="../../assests/Menu2/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="../../assests/Menu2/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="../../assests/Menu2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../assests/Menu2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../assests/Menu2/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="../../assests/Menu2/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="../../assests/Menu2/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="../../assests/Menu2/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="../../assests/Menu2/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../assests/Menu2/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../assests/Menu2/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="../../assests/Menu2/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="../../assests/Menu2/bower_components/moment/min/moment.min.js"></script>
  <script src="../../assests/Menu2/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="../../assests/Menu2/bower_components/raphael/raphael.min.js"></script>
  <script src="../../assests/Menu2/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="../../assests/Menu2/bower_components/Chart.js/Chart.js"></script>

  <script type="text/javascript" src="../../assests/alertifyjs/alertify.js"></script>
  <script type="text/javascript" src="../../crudjs/validar.js"></script>
  <script type="text/javascript" src="../../assests/select2/js/select2.min.js"></script>


</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
	<div class="wrapper">
		<header class="main-header">

	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="escritorio.php" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>SIS</b> SARAS</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>SIS</b> SARAS</span>
	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

			<span class="sr-only">Toggle navigation</span>

		</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<?php
						echo '<img src="../../img/Sistema/anonymous.png" class="user-image">';
					/*
										if($_SESSION["foto"] == ""){ //if($_SESSION["foto"] != ""){

						echo 'LLENAR IMAGEN DEL SISTEMA';

					}else{


						echo '<img src="../../assests/Menu2/img/usuarios/default/anonymous.png" class="user-image">';

					}

					*/

					?>

					<span class="hidden-xs"><?php echo $_SESSION["user"]; ?>  <!-- LLENAR USUARIOS CON FUNCTION --></span>

				</a>

				<!-- Dropdown-toggle -->

				<ul class="dropdown-menu">

					<li class="user-body">

						<div class="pull-right">

							<a href="../../Controlador/Usuario/logout.php" class="btn btn-default btn-flat">Salir</a>

						</div>

					</li>

				</ul>

			</li>

		</ul>

	</div>

</nav>

</header>
<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu">
			<li class="header">MENU NAVEGACION</li>
      <?php 
        require_once('../../config/Conexion/conexion.php');
        require_once('../../Modelo/layout/m_menu.php');
        $ubicacion= new m_Menu();
        $output=array("data" => array());
        $results=$ubicacion->select();     
      ?>

      <?php 
        foreach($results as $row) { 
      ?>
       <li class="treeview">
         <a href="#">
          <i class="<?php echo $row[2] ?>"></i>
          <span><?php echo $row[1];?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>           
          </span>
        </a>
        <ul class="treeview-menu">
          <?php 
          require_once('../../Modelo/layout/m_subMenu.php');
          $ubicacions= new m_subMenu();
          $resultss=$ubicacions->selectId($row[0]);          
          ?>
          <?php 
            foreach ($resultss as $rows) {
          ?>
            <li>
              <a href="<?php echo $path,$rows[4]; ?>">
                <i class="<?php echo $rows[3]; ?>"></i><?php echo $rows[2]; ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      <?php } ?>

    </li>

  </ul>

</section>

</aside>


