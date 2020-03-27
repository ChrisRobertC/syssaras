//globalizamos a manejadordatoscat1
var manejadordatossubmenu;

$(document).ready(function(){
	manejadordatossubmenu =$("#manejadordatossubmenu").DataTable({
		"ajax" : "../../Controlador/s_SubMenu/c_SubMenuGet.php",
		"order" : [],
		"oLanguage": {
			"sProcessing": "Procesando...",
			"sLengthMenu": 'Mostrar <select>' +
			'<option value="10">10</option>' +
			'<option value="20">20</option>' +
			'<option value="30">30</option>' +
			'<option value="40">40</option>' +
			'<option value="50">50</option>' +
			'<option value="-1">All</option>' +
			'</select> registros',
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Filtrar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Por favor espere - cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
	});
	$("#adddatosModalBtn").on('click',function(){
		//resetear el form
		$("#createsubmenuform")[0].reset();

		//remove error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		//remove el mensage
		$(".messages").html("");
		//submit form


		$("#createsubmenuform").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			

			var form = $(this);

			//validaciones
			var ddlmenu = $("#ddlmenu").val();
			var txtdescripcion = $("#txtdescripcion").val();
			var txturl = $("#txturl").val();
			var txticono =$("#txticono").val();
			var txtorden = $("#txtorden").val();
			
			if(ddlmenu==""){
				$("#ddlmenu").closest('.form-group').addClass('has-error');
				$("#ddlmenu").after('<p class="text-danger">El campo Menu es requerido</p>');
			}else{
				$("#ddlmenu").closest('.form-group').removeClass('has-error');
				$("#ddlmenu").closest('.form-group').addClass('has-success');
			}
			if(txtdescripcion == ""){
				$("#txtdescripcion").closest('.form-group').addClass('has-error');
				$("#txtdescripcion").after('<p class="text-danger">El campo descripcion es requerido</p>');
			}else if (!letras(txtdescripcion)) {
				$("#txtdescripcion").closest('.form-group').addClass('has-error');
				$("#txtdescripcion").after('<p class="text-danger">Solo letras</p>');
			}else{
				$("#txtdescripcion").closest('.form-group').removeClass('has-error');
				$("#txtdescripcion").closest('.form-group').addClass('has-success');
			}

			if(txturl == ""){
				$("#txturl").closest('.form-group').addClass('has-error');
				$("#txturl").after('<p class="text-danger">El campo Url es requerido</p>');
			}else{
				$("#txturl").closest('.form-group').removeClass('has-error');
				$("#txturl").closest('.form-group').addClass('has-success');
			}

			if(txticono == ""){
				$("#txticono").closest('.form-group').addClass('has-error');
				$("#txticono").after('<p class="text-danger">El campo Icono es requerido</p>');
			}else{
				$("#txticono").closest('.form-group').removeClass('has-error');
				$("#txticono").closest('.form-group').addClass('has-success');
			}

			if(txtorden == ""){
				$("#txtorden").closest('.form-group').addClass('has-error');
				$("#txtorden").after('<p class="text-danger">El campo Orden Menu es requerido</p>');
			}else{
				$("#txtorden").closest('.form-group').removeClass('has-error');
				$("#txtorden").closest('.form-group').addClass('has-success');
			}

			//comprobacion de valores
			var cdescripcion=letras(txtdescripcion);
			if (!cdescripcion) {
				alertify.error("Verifique los datos");
			}else{

			//verificado datos vacios
			if(ddlmenu && txtdescripcion && txticono && txturl  && txtorden){
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {
                    	//remove el error
                    	$(".form-group").removeClass('has-error').removeClass('has-success');

                    	if(response.success == true){
                    		$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                    			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    			'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                    			'</div>');

							 //resetaer el form
							 $("#createsubmenuform")[0].reset();
						 	//recargar las datatables funcion se crea a partir de las datables
						 	manejadordatossubmenu.ajax.reload(null,false);
						 }else{
						 	$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
						 		'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						 		'<strong><span class="glyphicon glyphicon-exclamation-sign"></span></strong>'+response.messages+
						 		'</div>');
						}//else
					} //succes
				});//ajax submit
			}//if
		}
		return false;
		});//submit form create datos
	}); //add modal


});

function eliminarDatos(id=null){
	if(id){
		$("#eliminarbtn").unbind('click').bind('click',function(){
			
			$.ajax({
				url: "../../Controlador/s_SubMenu/c_SubMenuDelete.php",
				type: "post",
				data: {dato_id:id},
				dataType: "json",
				success:function(response){
					//$(".eliminarmensaje").fadeOut(1500);
					if(response.success==true){
						$(".eliminarmensaje").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						manejadordatossubmenu.ajax.reload(null,false);
						//cerrar ventana modal
						$("#eliminarsubmenuModal").modal('hide');



					}else{
						$(".eliminarmensaje").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							'<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		});//click eliminarbtn
	}else{
		alert("Error:Necesita refrescar la pagina");
	}

}

function editardatos(id=null){
	if(id){
		//remove error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		//remove el mensage
		$(".editar_messages").html("");
		//submit form
		//remover datos_id
		$("#d_id").remove();

		//obtner datos
		$.ajax({
			url: "../../Controlador/s_SubMenu/c_SubMenuGetById.php",
			type: "post",
			data: {datos_id: id},
			dataType: "json",
			success:function(response){
				//console.log(response.output);
				$("#ddlemenu").val(response.SIS04_Id);
				document.getElementById("ddlemenu").disabled=true;				
				$("#txtedescripcion").val(response.SIS05_Nombre);
				$("#txteurl").val(response.SIS04_Url);
				$("#txteicono").val(response.SIS04_Icono);
				$("#txteorden").val(response.SIS05_Orden);
				$("#ddleestado").val(response.SIS05_Estado);
				//fin obtner

				//datos_id
				$(".editsubmenuModalid").append('<input type="hidden" name="d_id" id="d_id" value="'+response.SIS05_Id+'"/>');

				//here la actualizacion
				$("#updatesubmenuform").unbind('submit').bind('submit',function(){
					//rmover errores
					$(".text-danger").remove();

					var form =$(this);
					//validaciones
					
					var ddlemenu = $("#ddlemenu").val();					
					var txtedescripcion = $("#txtedescripcion").val();
					document.getElementById("ddlemenu").disabled=false;					
					var txteurl = $("#txteurl").val();
					var txteicono=$("#txteicono").val();
					var txteorden = $("#txteorden").val();
					var txteestado = $("#txteestado").val();
					
					if(txtedescripcion == ""){
						$("#txtedescripcion").closest('.form-group').addClass('has-error');
						$("#txtedescripcion").after('<p class="text-danger">El campo descripcion es Requerido</p>');
					}else if (!letras(txtedescripcion)) {
						$("#txtedescripcion").closest('.form-group').addClass('has-error');
						$("#txtedescripcion").after('<p class="text-danger">Solo letras</p>');
					}else{
						$("#txtedescripcion").closest('.form-group').removeClass('has-error');
						$("#txtedescripcion").closest('.form-group').addClass('has-success');
					}

					if(txteurl==""){
						$("#txteurl").closest('.form-group').addClass('has-error');
						$("#txteurl").after('<p class="text-danger">El campo Url es Requerido</p>');
					}else{
						$("#txteurl").closest('.form-group').removeClass('has-error');
						$("#txteurl").closest('.form-group').addClass('has-success');						
					}

					if(txteicono == ""){
						$("#txteicono").closest('.form-group').addClass('has-error');
						$("#txteicono").after('<p class="text-danger">El campo Icono es requerido</p>');
					}else{
						$("#txteicono").closest('.form-group').removeClass('has-error');
						$("#txteicono").closest('.form-group').addClass('has-success');
					}

					if(txteorden == ""){
						$("#txteorden").closest('.form-group').addClass('has-error');
						$("#txteorden").after('<p class="text-danger">El campo Orden Menu es requerido</p>');
					}else{
						$("#txteorden").closest('.form-group').removeClass('has-error');
						$("#txteorden").closest('.form-group').addClass('has-success');
					}

					if(ddleestado == ""){
						$("#ddleestado").closest('.form-group').addClass('has-error');
						$("#ddleestado").after('<p class="text-danger">El campo estado es Requerido</p>');
					}else{
						$("#ddleestado").closest('.form-group').removeClass('has-error');
						$("#ddleestado").closest('.form-group').addClass('has-success');
						
					}

					//comprobacion de valores
					var txtcedescripcion=letras(txtedescripcion);
					if (!txtcedescripcion) {
						alertify.error("Verifique los datos");
					}else{


					//verificado datos vacios
					if(ddlemenu && txtedescripcion && txteicono && txteurl  && txteorden && ddleestado){
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response){
								if(response.success=true){
									$(".editar_messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
										'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
										'</div>');

									manejadordatossubmenu.ajax.reload(null,false);

										//remover el error
										$(".form-group").removeClass('has-success').removeClass('has-error');
										$(".text-danger").remove();
										document.getElementById("ddlemenu").disabled=true;				
										
									}else{
										$(".editar_messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
											'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
											'<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
											'</div>');
									}
							}//success

						});//ajax
					}//if
				}
				return false;
			});		
			}//success
		});////fin obtner

}else{
	alert("Error:Necesita refrescar la pagina");
}
}



