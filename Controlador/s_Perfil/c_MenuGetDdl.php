<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Perfil/ms_Perfil.php');
$ms_perfil= new ms_Perfil();
$output=array("data" => array());
$resultado=$ms_perfil->selectddl();
foreach ($resultado as $row){
	
}
echo json_encode($row);
 ?>