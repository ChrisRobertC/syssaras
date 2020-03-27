<?php

require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Menu/ms_Menu.php');

$ms_Menu =new ms_Menu;

$output=array("success" => false, "messages" => array());

$dato_id =$_POST['dato_id'];

$conf=$ms_Menu->delete($dato_id);


if($conf===TRUE){
	$output['success']=true;
	$output['messages']="Registro Eliminado";
}else{
	$output['success']=false;
	$output['messages']="Error al eliminar";

}

//$con->close();
echo json_encode($output);