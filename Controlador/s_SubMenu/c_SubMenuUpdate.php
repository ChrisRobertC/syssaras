<?php 
session_start();
//$user=$_SESSION['user'];
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_SubMenu/ms_SubMenu.php');

//if($_POST){
	$ms_subMenu=new ms_SubMenu;
    //$con = conect();
	$validator = array('success' => false, 'messages' => array());

    $id=$_POST["d_id"];
    $ddlemenu = $_POST['ddlemenu'];
	$txtedescripcion=ucwords($_POST['txtedescripcion']);	
	$txteurl=$_POST['txteurl'];	
	$txteicono=$_POST['txteicono'];	
	$txteorden = $_POST['txteorden'];	
	$ddleestado =$_POST['ddleestado'];

	$datos=[$ddlemenu,$txtedescripcion,$txteicono,$txteurl,$txteorden,$ddleestado,$id];
	$conf=$ms_subMenu->update($datos);

	if($conf) {           
        $validator['success'] = true;
        $validator['messages'] = "Registro Actualizado";     
    } else {        
        $validator['success'] = false;
        $validator['messages'] = "No se pudo actualizar";
    }
 
    // close the database connection
    //$con->close();
 
    echo json_encode($validator);
    //echo json_encode($sql);
//}
