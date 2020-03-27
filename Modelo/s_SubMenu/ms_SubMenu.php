<?php 
class ms_SubMenu{
	private $db;

	function __construct(){
		$this->db=Conectar::conexion();
	}

	function insert($datos){
		$sql=$this->db->prepare("INSERT INTO SIS05_SubMenu(SIS04_Id,SIS05_Nombre,SIS04_Icono,SIS04_Url,SIS05_Orden,SIS05_Estado) VALUES (?,?,?,?,?,?)");
		$conf=$sql->execute([$datos[0], $datos[1],$datos[2], $datos[3],$datos[4],$datos[5]]);

			//print_r($sql->errorInfo());
		return $conf;
	}
	function update($datos){
		$sql=$this->db->prepare("UPDATE SIS05_SubMenu SET SIS04_Id=?,SIS05_Nombre=?,SIS04_Icono=?,SIS04_Url=?,SIS05_Orden=?, SIS05_Estado=? WHERE SIS05_Id=?");
		$conf=$sql->execute([$datos[0], $datos[1],$datos[2], $datos[3],$datos[4],$datos[5],$datos[6]]);

		return $conf;
	}

	function delete($id){
		$sql=$this->db->prepare("DELETE FROM SIS05_SubMenu WHERE SIS05_Id=?");
		$conf=$sql->execute([$id]);

		return $conf;
	}

	function select(){
		$res=$this->db->query("SELECT SIS05.SIS05_Id,SIS04.SIS04_Nombre,SIS05.SIS05_Nombre,SIS05.SIS04_Icono,SIS05.SIS04_Url,SIS05.SIS05_Orden,SIS05.SIS05_Estado
			 	FROM SIS05_SubMenu SIS05
				INNER JOIN SIS04_Menu SIS04
				ON SIS05.SIS04_Id=SIS04.SIS04_Id
				ORDER BY SIS05.SIS05_Orden ASC");
		    // $datos=array();

		    // foreach ($res as $row){
		    //     $datos[]=$row;		        
		    // }

		    // $arr=json_encode($datos);

		return $res;			
	}

	function selectId($id){
		$res=$this->db->query("SELECT * FROM SIS05_SubMenu WHERE SIS05_Id=$id");
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
