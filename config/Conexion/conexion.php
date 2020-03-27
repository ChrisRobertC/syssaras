<?php 
	//class Conexion{
	//	public function get_Conexion(){
/*function conect(){
			$user="criss";
			$pass="T1u2c3o4s5,";
			$host="174.138.186.2,1433";
			$db="optimeec_saras";
			$conexion =new PDO("sqlsrv:Server=$host;Database=$db;",$user,$pass);
			return $conexion;
		}*/
		class Conectar{
		public static function conexion(){
	 		include ('db.php');

	 		$con=null;

			try{
				$con=new PDO($dsn,$username, $password,
     			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

     			return $con;
			}catch(PDOException $e){
				echo 'Falló la conexión: ' . $e->getMessage();				
				return $con;
			}			
		}		
	}
	
 ?>