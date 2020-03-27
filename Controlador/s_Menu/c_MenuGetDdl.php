<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Menu/ms_Menu.php');
$ubicacion= new ms_Menu();
$output=array("data" => array());
$resultado=$ubicacion->selectddl();
foreach ($resultado as $row){
	
}
echo json_encode($row);
 ?>