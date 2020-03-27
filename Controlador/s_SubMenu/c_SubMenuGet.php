<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_SubMenu/ms_SubMenu.php');
$ubicacion= new ms_SubMenu();
$output=array("data" => array());
$resultado=$ubicacion->select();


$x=1;
foreach ($resultado as $row){
	$estado='';
	if($row[6]==1){
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
				    <li><a type="button" data-toggle="modal" data-target="#editarsubmenuModal" onclick="editardatos('.$row[0].')"> <span class="glyphicon glyphicon-edit"></span> Editar</a></li>
				    <li><a type="button" data-toggle="modal" data-target="#eliminarsubmenuModal" onclick="eliminarDatos('.$row[0].')"> <span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>	    
			    </ul>
				</div>
				';
	$output['data'][]=array(
		$x,
		$row[1],
		$row[2],
		$row[3],
		$row[4],
		$row[5],
		$estado	,
		$actionButton		
	);
	$x++;
}
echo json_encode($output);
 ?>