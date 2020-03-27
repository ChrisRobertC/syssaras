<?php 
class ms_Menu{
	private $db;

	function __construct(){
		$this->db=Conectar::conexion();
	}

	function insert($datos){
		$sql=$this->db->prepare("INSERT INTO SIS04_Menu(SIS04_Nombre,SIS04_Url,SIS04_Icono,SIS04_Orden,SIS04_Estado) VALUES (?,?,?,?,?)");
		$conf=$sql->execute([$datos[0], $datos[1],$datos[2], $datos[3],$datos[4]]);

			//print_r($sql->errorInfo());
		return $conf;
	}
	function update($datos){
		$sql=$this->db->prepare("UPDATE SIS04_Menu SET SIS04_Nombre=?,SIS04_Url=?,SIS04_Icono=?,SIS04_Orden=?,SIS04_Estado=? WHERE SIS04_Id=?");
		$conf=$sql->execute([$datos[0], $datos[1],$datos[2], $datos[3],$datos[4],$datos[5]]);

		return $conf;
	}

	function delete($id){
		$sql=$this->db->prepare("DELETE FROM SIS04_Menu WHERE SIS04_Id=?");
		$conf=$sql->execute([$id]);

		return $conf;
	}

	function select(){
		$res=$this->db->query("SELECT * FROM SIS04_Menu ORDER BY SIS04_Orden ASC");
		    // $datos=array();

		    // foreach ($res as $row){
		    //     $datos[]=$row;		        
		    // }

		    // $arr=json_encode($datos);

		return $res;			
	}

	function selectddl(){
		$res=$this->db->query("SELECT SIS04_Id,SIS04_Nombre FROM SIS04_Menu WHERE SIS04_Estado=1");
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
}
?>
