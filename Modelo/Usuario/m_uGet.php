<?php 
class m_uGet{
	private $db;

	function __construct(){
		$this->db=Conectar::conexion();
	}
	function select(){
			$res=$this->db->query("SELECT * FROM SIS04_Menu");
		    // $datos=array();
		    
		    // foreach ($res as $row){
		    //     $datos[]=$row;		        
		    // }
		    
		    // $arr=json_encode($datos);

			return $res;			
		}
}
 ?>
