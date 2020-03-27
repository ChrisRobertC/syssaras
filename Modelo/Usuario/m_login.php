<?php 
    class m_Usuario{
        private $db;

        function __construct(){
            $this->db=Conectar::conexion();
        }     

        function login($user,$pass){
            $stmt=$this->db->prepare("SELECT SIS02_ID FROM SIS02_Usuario WHERE SIS02_Usuario=:user AND SIS02_Contrasenia=:pass"); 
            $stmt->bindParam("user", $user,PDO::PARAM_STR) ;
            $stmt->bindParam("pass", $pass,PDO::PARAM_STR) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count)
            {
            $_SESSION['uid']=$data->SIS02_ID; // Storing user session value
            return true;
            }
            else
            {
            return false;
            } 
        }   

        function selectId($user,$pass){
            $sql="SELECT * FROM SIS02_Usuario WHERE SIS02_Usuario='".$user."' and SIS02_Contrasenia='".$pass."'";
            $res = $this->db->query($sql);  
            return $res;
        }       
    }
?>