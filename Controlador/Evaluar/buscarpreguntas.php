<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Evaluar/m_buscarpreguntas.php');
$m_buscarPreguntas = new m_buscarPreguntas;
$txtbusqueda = $_POST['busqueda'];
$results=$m_buscarPreguntas->selectParametro($txtbusqueda);
/*if(isset($_POST['busqueda'])){
	$txtbusqueda = $_POST['busqueda'];
	//$txtbusqueda = $_POST['busqueda'];

	$sql ="SELECT P01.P01_ID,P01.P01_RUC,P03.P03_Pregunta,P03.P03_Respuesta,P03.P03_Mensaje 
			FROM P03_Preguntas P03 CROSS join P02_EmpresaRiesgo P02 
			INNER JOIN P01_EmpresaSri P01 ON P02.P01_Id=P01.P01_Id WHERE P01.P01_RUC='$txtbusqueda' AND P02.P02_Riesgo='Alto'";

	$getResults=$conn->prepare($sql);
	$getResults->execute();
	$results=$getResults->fetchAll(PDO::FETCH_BOTH);*/
	$i=0;
	foreach ($results as $row) {
		//$filap = explode("|", utf8_encode($row));
		if ($row[1]==$txtbusqueda) {
			echo '
			<div class="form-group">
			<label for="" class="control-label col-sm-7">¿'.$row[2].'?</label>
			<div class="col-sm-5">
			<input type="checkbox" class="" value="rbsi_'.$i.'" name="rbsi" id="rbsi_'.$i.'">
			</div>
			</div>  
			' ;								
		}
		$i=$i+1;
	}
?>