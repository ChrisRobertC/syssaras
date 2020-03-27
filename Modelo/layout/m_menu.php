<?php 
class m_Menu{
	private $db;

	function __construct(){
		$this->db=Conectar::conexion();
	}
	function select(){
			$res=$this->db->query("SELECT * FROM SIS04_Menu WHERE SIS04_Estado=1 ORDER BY SIS04_Orden ASC");
		    // $datos=array();
		    
		    // foreach ($res as $row){
		    //     $datos[]=$row;		        
		    // }
		    
		    // $arr=json_encode($datos);

			return $res;			
		}
}
 ?>
