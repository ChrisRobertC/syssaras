<?php 

require_once "../../config/FunctionSystem/password_encriptar.php";
/*$salt = '34a@$#aA9823$';
$password = 'agencialanave28625';
$password = hash('sha256', $salt . $password);

echo $password;

$contrasenarecibidaporPOST= '$2a$07$yMoJrJpwEPrmVnZx4KIyNuOAiOMQksjkV1EW0YRgVe33eYe/yT60y';

$passwordenMYSQL = '$2a$07$yMoJrJpwEPrmVnZx4KIyNuOAiOMQksjkV1EW0YRgVe33eYe/yT60y';

if( crypt($contrasenarecibidaporPOST, $passwordenMYSQL) == $passwordenMYSQL) {
 echo 'Es igual, el usuario se ha loggeado. ';
}else{
	echo "string";
}*/





/*$texto = "La seguridad si es importante";

// Encriptamos el contenido
$texto_encriptado = Encryptar::encrypt($texto);

// Desencriptamos el contenido
$texto_original = Encryptar::decrypt($texto_encriptado);

/*if ($texto == $texto_original) echo 'Encriptación = Desencriptación => son iguales.';*/
/*$password="T1u2c3o4s5,s";
$hash = password_hash($password, PASSWORD_DEFAULT, ['cost'=>10]);

echo $hash.'<br>';

if(password_verify($password, $hash)){
	echo "c";
}else{
	echo "error";
}*/



/*$pp=crypt_blowfish_agencialanave('Adm123!!');
echo $pp; 
*/
/*$contrasenarecibidaporPOST= 'Adm123!!';

$passwordenMYSQL = '$2a$07$epJtBGTILqZuJcNG8ZxBvOgPJdxixDGe9NQEGna.XwyIHszbZK4cC';

if( crypt($contrasenarecibidaporPOST, $passwordenMYSQL) == $passwordenMYSQL) {
 echo 'Es igual, el usuario se ha loggeado. ';
}*/

$encr=new Encryptar;

$texto = "userp";
// Encriptamos el contenido
$texto_encriptado = $encr->encrypt($texto);

echo $texto_encriptado;
echo '<br>';
$texto_original = Encryptar::decrypt($texto_encriptado);

if ($texto == $texto_original) {
	echo 'Encriptación = Desencriptación => son iguales.';
}else{
	echo 'sss';
}

