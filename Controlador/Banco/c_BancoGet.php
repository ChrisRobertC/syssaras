<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Banco/m_Banco.php');
$ubicacion= new m_Banco();
$output=array("data" => array());
$resultado=$ubicacion->select();


$x=1;
foreach ($resultado as $row){
	$estado='';
	if($row[4]==1){
		$estado='<label class="label label-success">Activo</label>';
	}else{
	$estado='<label class="label label-danger">Inactivo</label>';
	}
	$imagen='';
	if($row[3]!=""){
		$imagen='<img src="'.$row[3].'" width="200px" height="100"></img>';
	}
	$actionButton ='
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Acciones <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu">
				    <li><a type="button" data-toggle="modal" data-target="#editarmenuModal" onclick="editardatos('.$row[0].')"> <span class="glyphicon glyphicon-edit"></span> Editar</a></li>
				    <li><a type="button" data-toggle="modal" data-target="#eliminarbancoModal" onclick="eliminarDatos('.$row[0].')"> <span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>	    
			    </ul>
				</div>
				';
	$output['data'][]=array(
		$x,
		$imagen,
		//$row[3],
		$row[1],
		$row[2],		
		$estado	,
		$actionButton		
	);
	$x++;
}
echo json_encode($output);
 ?>