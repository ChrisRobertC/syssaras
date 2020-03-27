<?php 
session_start();
//$user=$_SESSION['user'];
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/s_Menu/ms_Menu.php');

//if($_POST){
	$ms_Menu=new ms_Menu;
    //$con = conect();
	$validator = array('success' => false, 'messages' => array());
    
	$txtdescripcion=ucwords($_POST['txtdescripcion']);	
	$txticono=$_POST['txticono'];	
	$txtorden = $_POST['txtorden'];
	$txturl=$_POST['txturl'];	
	$estado="1";

	$datos=[$txtdescripcion,$txturl,$txticono,$txtorden,$estado];
	$conf=$ms_Menu->insert($datos);

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
