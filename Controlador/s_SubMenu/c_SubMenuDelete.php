<?php

require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_SubMenu/ms_SubMenu.php');

$ms_SubMenu =new ms_SubMenu;

$output=array("success" => false, "messages" => array());

$dato_id =$_POST['dato_id'];

$conf=$ms_SubMenu->delete($dato_id);


if($conf===TRUE){
	$output['success']=true;
	$output['messages']="Registro Eliminado";
}else{
	$output['success']=false;
	$output['messages']="Error al eliminar";

}

//$con->close();
echo json_encode($output);