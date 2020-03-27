<?php 
session_start();
//$user=$_SESSION['user'];
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Banco/m_Banco.php');

//if($_POST){
	$m_banco = new m_Banco;
    //$con = conect();
	$validator = array('success' => false, 'messages' => array());
    
	$txtdescripcion=ucwords($_POST['txtdescripcion']);	
    /*$uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../../img/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }*/
	//imagen
    $ruta = "../../img/Sistema/anonymous.png";

    if(!empty($_FILES["file"]["name"])){

        list($ancho, $alto) = getimagesize($_FILES["file"]["tmp_name"]);

        $nuevoAncho = 500;
        $nuevoAlto = 500;

    /*=============================================
    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
    =============================================*/

        $directorio = "../../img/";

        //mkdir($directorio, 0755);

    /*=============================================
    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
    =============================================*/

        if($_FILES["file"]["type"] == "image/jpeg"){

        /*=============================================
        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
        =============================================*/

            $aleatorio = mt_rand(100,999);

            $ruta = "../../img/".$aleatorio.".jpg";

            $origen = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);                      

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);

        }

    if($_FILES["file"]["type"] == "image/png"){

        /*=============================================
        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
        =============================================*/

        $aleatorio = mt_rand(100,999);

        $ruta = "../../img/".$aleatorio.".png";

        $origen = imagecreatefrompng($_FILES["file"]["tmp_name"]);                       

        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

        imagepng($destino, $ruta);

    }

}
    //fin imagen	
	$txtdireccion = $_POST['txtdireccion'];	
	$estado="1";

	$datos=[$txtdescripcion,$txtdireccion,$ruta,$estado];
	$conf=$m_banco->insert($datos);

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
