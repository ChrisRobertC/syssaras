<?php 
require_once('../../config/Conexion/conexion.php');
require_once('../../Modelo/Evaluar/m_buscar.php');
$evaluar = new m_Evaluar;
$txtbusqueda = $_POST['busqueda'];
$results=$evaluar->selectParametro($txtbusqueda);

foreach ($results as $rows) {
			//$fila = explode("|", utf8_encode($row));
			if ($rows[1]==$txtbusqueda) {
				echo 
				'<div class="container"><br>
						<div class="row">							
							<div class="col-lg-6">
							<b>Ruc:</b> '.$rows[1].'<br><b>CIIU:</b> '.$rows[2].'<br><b>Descripción:</b> '.$rows[3].'<br>
							</div>
						</div>
				</div>
			'	;	
			if($rows[5]!=5){
				echo '<script>llamarmodal();ruc();</script>';
			}
		}
	}
 ?>