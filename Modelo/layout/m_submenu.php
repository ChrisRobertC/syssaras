<?php 
class m_subMenu{
	private $db;

	function __construct(){
		$this->db=Conectar::conexion();
	}
	function selectId($id){	
			$res=$this->db->query("SELECT * FROM SIS05_SubMenu WHERE SIS04_ID=$id AND SIS05_Estado=1 ORDER BY SIS05_Orden ASC ");
		    // $datos=array();
		    
		    // foreach ($res as $row){
		    //     $datos[]=$row;		        
		    // }
		    
		    // $arr=json_encode($datos);

			return $res;			
		}
}
 ?>
