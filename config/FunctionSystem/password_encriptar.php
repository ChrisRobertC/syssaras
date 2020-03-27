<?php

/*function crypt_blowfish_agencialanave($password, $digito = 7) {  
$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
$salt = sprintf('$2a$%02d$', $digito);  
for($i = 0; $i < 22; $i++)  
{  
 $salt .= $set_salt[mt_rand(0, 63)];  
}  
return crypt($password, $salt);  
}*/


class Encryptar{

    private static $Key = "InfocaDes200323";

    public static function encrypt ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encryptar::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encryptar::$Key))));
        return $output;
    }

    public static function decrypt ($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encryptar::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Encryptar::$Key))), "\0");
        return $output;
    }

}