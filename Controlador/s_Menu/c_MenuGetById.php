<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Menu/ms_Menu.php');
$ms_Menu =new ms_Menu;
$datos_id = $_POST['datos_id'];
$resultado=$ms_Menu->selectId($datos_id);
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