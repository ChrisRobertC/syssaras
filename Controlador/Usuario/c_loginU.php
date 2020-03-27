<?php
// session_start();
// require_once('../../config/Conexion/conexion.php');
// require_once('../../Modelo/Usuario/m_login.php');
// require_once('../../config/FunctionSystem/password_encriptar.php');

// $validator = array('success' => false, 'messages' => array());
// $usuario= new m_Usuario;

// $user=$_POST['txtusername'];
// $pass=Encryptar::encrypt($_POST['txtpassword']);
// $datos=[$user,$pass];
// $conf=$usuario->login($user,$pass);

// //echo $conf;
// if($conf){
//     // $validator['success'] = true;
//     // $validator['messages'] = "Iniciando Session";
//     $resultado=$usuario->selectId($user,$pass); 
//     foreach ($resultado as $rows) {
//     }
//     $_SESSION['user']=$user;
//     header('location: ../../View/Bienvenida/index.php');        

//     //echo "1correc";
// }else{
//     header('location: ../../View/Account/Login.php');            
//    // $validator['success'] = false;
//    // $validator['messages'] = "Datos Errones, verifique";
// }

//echo json_encode($validator);
session_start();
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Usuario/m_login.php');
require_once('../../config/FunctionSystem/password_encriptar.php');

$validator = array('success' => false, 'messages' => array());
$usuario= new m_Usuario;

$user=$_POST['txtusername'];
$pass=Encryptar::encrypt($_POST['txtpassword']);
$datos=[$user,$pass];
$conf=$usuario->login($user,$pass);

//echo $conf;
if($conf){
    $validator['success'] = true;
    $validator['messages'] = "Iniciando Session";
    $resultado=$usuario->selectId($user,$pass); 
    foreach ($resultado as $rows) {
    }
    $_SESSION['user']=$user;
    //header('location: ../../View/Welcome/index.php');        

    //echo "1correc";
}else{
   $validator['success'] = false;
   $validator['messages'] = "Datos Errones, verifique";
}

echo json_encode($validator);

