<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Menu/ms_Menu.php');
$ubicacion= new ms_Menu();
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
	$actionButton ='
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Acciones <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu">
				    <li><a type="button" data-toggle="modal" data-target="#editarmenuModal" onclick="editardatos('.$row[0].')"> <span class="glyphicon glyphicon-edit"></span> Editar</a></li>
				    <li><a type="button" data-toggle="modal" data-target="#eliminarmenuModal" onclick="eliminarDatos('.$row[0].')"> <span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>	    
			    </ul>
				</div>
				';
	$output['data'][]=array(
		$x,
		$row[1],
		$row[5],
		$row[2],
		$row[3],
		$estado	,
		$actionButton		
	);
	$x++;
}
echo json_encode($output);
 ?>