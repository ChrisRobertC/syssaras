<?php 
require_once "../../config/Conexion/conexion.php";
 $conn = conect();
if(isset($_POST['busqueda'])){
	$txtbusqueda = $_POST['busqueda'];

		$sql ="SELECT P01.P01_ID,P01.P01_Ruc,P01.P01_CIUU,P01.P01_ActividadEconomica,P02.P02_Riesgo,P02.P02_Preguntas FROM P01_EmpresaSri P01 INNER JOIN P02_EmpresaRiesgo P02 ON P01.P01_ID=P02.P01_Id WHERE P01.P01_RUC='$txtbusqueda'";

		$getResults=$conn->prepare($sql);
        $getResults->execute();
        $results=$getResults->fetchAll(PDO::FETCH_BOTH);
		foreach ($results as $rows) {
			//$fila = explode("|", utf8_encode($row));
			if ($rows[1]==$txtbusqueda) {
				echo 
				'<div class="container"><br>
						<div class="row justify-content-center align-items-center minh-100">
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
							<b>Ruc:</b> '.$rows[1].'<br><b>CIIU:</b> '.$rows[2].'<br><b>Descripción:</b> '.$rows[3].'<br>
							</div>
						</div>
				</div>
			'	;	
						if($rows[5]==1){
				echo '<script>llamarmodal();ruc();</script>';
			}
			}
		}
}
 ?>
