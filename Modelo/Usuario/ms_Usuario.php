<?php 
class ms_Usuario{
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
		$res=$this->db->query("SELECT SIS02_Id,SIS01.SIS01_Nombre,P04.P04_Nombre,SIS02_Usuario,
CONCAT(SIS02_PNombre,' ',SIS02_SNombre,' ',SIS02_PApellido,' ',SIS02_SApellido) as Datosp,SIS02_Correo, 
CONCAT(SIS02_Celular,'-',SIS02_Telefono) AS DatosT,SIS02_Estado 
FROM SIS02_Usuario SIS02 INNER JOIN SIS01_Perfil SIS01
ON SIS02.SIS01_Id=SIS01.SIS01_Id
INNER JOIN P04_Banco P04
ON SIS02.P04_Id=P04.P04_Id");
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
