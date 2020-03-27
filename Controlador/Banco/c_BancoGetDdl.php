<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Banco/m_Banco.php');
$ubicacion= new m_Banco();
$output=array("data" => array());
$resultado=$ubicacion->selectddl();
foreach ($resultado as $row){
	
}
echo json_encode($row);
 ?>