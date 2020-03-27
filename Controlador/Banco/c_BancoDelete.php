<?php

require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Banco/m_Banco.php');

$m_banco =new m_Banco;

$output=array("success" => false, "messages" => array());

$dato_id =$_POST['dato_id'];

$conf=$m_banco->delete($dato_id);


if($conf===TRUE){
	$output['success']=true;
	$output['messages']="Registro Eliminado";
}else{
	$output['success']=false;
	$output['messages']="Error al eliminar";

}

//$con->close();
echo json_encode($output);