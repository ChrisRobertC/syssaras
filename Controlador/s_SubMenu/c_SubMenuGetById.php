<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_SubMenu/ms_SubMenu.php');
$ms_subMenu =new ms_SubMenu;
$datos_id = $_POST['datos_id'];
$resultado=$ms_subMenu->selectId($datos_id);
$output=array("data" => array());


foreach ($resultado as $row){
	// $output['data'][]=array(
	// $row[0],
	// $row[1],
	// $row[5],
	// $row[2],
	// $row[3],
	// $row[4]		
	// );
	//$x++;
}


		//$arr=json_encode($datos);

echo json_encode($row);