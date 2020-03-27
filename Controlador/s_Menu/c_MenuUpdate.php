<?php 
session_start();
//$user=$_SESSION['user'];
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Menu/ms_Menu.php');

//if($_POST){
	$ms_Menu=new ms_Menu;
    //$con = conect();
	$validator = array('success' => false, 'messages' => array());
    $id=$_POST["d_id"];
	$txtedescripcion=ucwords($_POST['txtedescripcion']);	
	$txteurl=$_POST['txteurl'];	
	$txteicono=$_POST['txteicono'];	
	$txteorden = $_POST['txteorden'];	
	$ddleestado =$_POST['ddleestado'];

	$datos=[$txtedescripcion,$txteurl,$txteicono,$txteorden,$ddleestado,$id];
	$conf=$ms_Menu->update($datos);

	if($conf) {           
        $validator['success'] = true;
        $validator['messages'] = "Registro Añadido";     
    } else {        
        $validator['success'] = false;
        $validator['messages'] = "No se pudo registrar";
    }
 
    // close the database connection
    //$con->close();
 
    echo json_encode($validator);
    //echo json_encode($sql);
//}
