<?php
	$alto ="Alto";
	$medio = "Medio";
	$bajo = "Bajo"; 
	$minimo = "Mínimo";
		$txtciiu = $_POST['busqueda'];
		$txtmonto = $_POST["monto"];
		$cert =$_POST["certi"];

		$path = "../../Files/CIIU_Riesgos.csv";
		if (!file_exists($path)) {
			exit("Archivo no encontrado");
		}
		$rows = file($path);
		array_shift($rows);
		foreach ($rows as $row) {
			$fila = explode("|", utf8_encode($row));
			if ($fila[0]==$txtciiu) {
				if ($fila[4]==1) { //valores de preguntas SI
					if($cert==0){//valores checkbox==0
						if($fila[3]==$minimo){//valores minimos
							echo '<div class="container"><br>
									<div class="row">
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';	
						}elseif ($fila[3]==$bajo) {//valores bajos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<=800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<=2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </p>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y Documentos</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$medio) {//valores medios
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<=800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<=2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </p>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y Documentos</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORÍA A </h4>
											<p>Aplica Debida Diligencia Ampliada</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios.</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$alto) {//valores altos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<=800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </p>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y Documentos</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<=2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORÍA A </h4>
											<p>Aplica Debida Diligencia Ampliada</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios.</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000 && $txtmonto<5000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORÍA A </h4>
											<p>Aplica Debida Diligencia Ampliada</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios.</p>
										</div>
									</div>
							</div>';
							}elseif ($txtmonto>=5000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORIA A </h4>									
											<p>Evaluación de estandares de desempeño IFC.</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios y otros documentos de gestión</p>
										</div>
									</div>
							</div>';
							}
						}
					}else{//valores checkbox>0
						if($fila[3]==$minimo){//valores minimos
							echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con credito normal</p>
										</div>
										</div>
									</div>
							</div>
							';	
						}elseif ($fila[3]==$bajo) {//valores bajos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">Aplica Aplica Debida Diligencia Simplificada</h4>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$medio) {//valores medios
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$alto) {//valores altos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>
							';
							}
						}
					}
				}elseif ($fila[4]==0 || $fila[4]=="") {//VALORES DE PREGUNTAS NO Y VACIO
					if($cert==0){//valores checkbox==0
						if($fila[3]==$minimo){//valores minimos
							echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';	
						}elseif ($fila[3]==$bajo) {//valores bajos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<=800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<=2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$medio) {//valores medios
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<=800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<=2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </p>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y Documentos</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORÍA A </h4>
											<p>Aplica Debida Diligencia Ampliada</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios.</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$alto) {//valores altos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<=800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </p>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y Documentos</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<=2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORÍA A </h4>
											<p>Aplica Debida Diligencia Ampliada</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios.</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000 && $txtmonto<5000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORÍA A </h4>
											<p>Aplica Debida Diligencia Ampliada</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios.</p>
										</div>
									</div>
							</div>';
							}elseif ($txtmonto>=5000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-danger" role="alert">
											<h4 class="alert-heading">CATEGORIA A </h4>									
											<p>Evaluación de estandares de desempeño IFC.</p>
											<p>Solicitar permisos ambientales y sociales y Aúditorias/Estudios y otros documentos de gestión</p>
										</div>
									</div>
							</div>';
							}
						}
					}else{//valores checkbox>0
						if($fila[3]==$minimo){//valores minimos
							echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
											<div class="alert alert-info" role="alert">
												<p>Proceder con crédito normal</p>											
											</div>
										</div>
									</div>
							</div>
							';	
						}elseif ($fila[3]==$bajo) {//valores bajos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C -VERDE</h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$medio) {//valores medios
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">CATEGORIA B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>';
							}
						}elseif ($fila[3]==$alto) {//valores altos
							if ($txtmonto<=250000) {
								echo '<div class="container">
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-info" role="alert">
											<p>Proceder con crédito normal</p>											
										</div>
										</div>
									</div>
							</div>
							';
							}elseif ($txtmonto>250000 && $txtmonto<800000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>800000 && $txtmonto<2000000) {								
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
											<h4 class="alert-heading">CATEGORÍA C </h4>
											<p>Aplica Debida Diligencia Simplificada</p>
											<p>Completar Formulario</p>
										</div>
										</div>
									</div>
							</div>
							';	
							}elseif ($txtmonto>2000000) {
								echo '<div class="container"><br>
									<div class="row">
										
										<div class="col-lg-6">
										<div class="alert alert-warning" role="alert">
											<h4 class="alert-heading">Categoría B </h4>
											<p>Aplica Debida Diligencia Media</p>
											<p>Solicitar permisos ambientales y sociales y Documentos</p>
										</div>
									</div>
							</div>
							';
							}
						}
					}
				}
			}
		}
 ?>