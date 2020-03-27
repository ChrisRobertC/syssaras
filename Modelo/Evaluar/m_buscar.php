<?php 
    class m_Evaluar{
        private $db;

        function __construct(){
            $this->db=Conectar::conexion();
        }        

        function selectParametro($parametro){
            $sql="SELECT P01.P01_ID,P01.P01_Ruc,P01.P01_CIUU,P01.P01_ActividadEconomica,P02.P02_Riesgo,P02.P02_Preguntas FROM P01_EmpresaSri P01 INNER JOIN P02_EmpresaRiesgo P02 ON P01.P01_ID=P02.P01_Id WHERE P01.P01_RUC= '".$parametro."' ";
            $res = $this->db->query($sql);              
            //$conf=$sql->execute([$username],[$password]);
            return $res;
        }       
    } 
 ?>
