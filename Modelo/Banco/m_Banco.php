<?php 
class m_Banco{
	private $db;

	function __construct(){
		$this->db=Conectar::conexion();
	}

	function insert($datos){
		$sql=$this->db->prepare("INSERT INTO P04_Banco(P04_Nombre,P04_Direccion,P04_Logo,P04_Estado) VALUES (?,?,?,?)");
		$conf=$sql->execute([$datos[0], $datos[1],$datos[2], $datos[3]]);

			//print_r($sql->errorInfo());
		return $conf;
	}
	function update($datos){
		$sql=$this->db->prepare("UPDATE `hogar` 
			SET `idUbicacion`=?,
			`integrantes`=?,
			`estado`=?,
			`cupo`=? 
			WHERE `idHogar`=?");
		$conf=$sql->execute([$datos[0], $datos[1],$datos[2], $datos[3],$datos[4]]);

		return $conf;
	}

	function delete($id){
		$sql=$this->db->prepare("DELETE FROM P04_Banco WHERE P04_Id=?");
		$conf=$sql->execute([$id]);

		return $conf;
	}

	function select(){
		$res=$this->db->query("SELECT * FROM P04_Banco ORDER BY P04_Id ASC");
		    // $datos=array();

		    // foreach ($res as $row){
		    //     $datos[]=$row;		        
		    // }

		    // $arr=json_encode($datos);

		return $res;			
	}

	function selectId($id){
		$res=$this->db->query("SELECT * FROM SIS04_Menu WHERE SIS04_Id=$id");
		//$res = $this->db->prepare($sql);

		$datos=array();

		// foreach ($res as $row){
		// 	$datos[]=$row;
		// }

		// $arr=json_encode($datos);

		return $res;			
	}

	function selectddl(){
		$res=$this->db->query("SELECT P04_Id,P04_Nombre FROM P04_Banco WHERE P04_Estado=1");
		return $res;			
	}
}
?>
