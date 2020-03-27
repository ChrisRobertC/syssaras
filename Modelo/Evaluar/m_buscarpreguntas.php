<?php 
    class m_buscarPreguntas{
        private $db;

        function __construct(){
            $this->db=Conectar::conexion();
        }        

        function selectParametro($parametro){
            $sql="SELECT P01.P01_ID,P01.P01_RUC,P03.P03_Pregunta,P03.P03_Respuesta,P03.P03_Mensaje
            FROM P03_Preguntas P03 CROSS join P02_EmpresaRiesgo P02 
            INNER JOIN P01_EmpresaSri P01 ON P02.P01_Id=P01.P01_Id WHERE P01.P01_RUC= '".$parametro."' AND P02.P02_Riesgo='Alto' ";
            $res = $this->db->query($sql);              
            //$conf=$sql->execute([$username],[$password]);
            return $res;
        }       
    } 
 ?>
