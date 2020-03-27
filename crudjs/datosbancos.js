//globalizamos a manejadordatoscat1
var manejadordatosbanco;

$(document).ready(function(){
	manejadordatosbanco =$("#manejadordatosbanco").DataTable({
		"ajax" : "../../Controlador/Banco/c_BancoGet.php",
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
		$("#createbancoform")[0].reset();

		//remove error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		//remove el mensage
			$(".messages").html("");
		//submit form


		$("#createbancoform").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			

			var form = $(this);

			//validaciones
			var txtdescripcion = $("#txtdescripcion").val();
			var file =  $("#file")[0].files[0];
			var txtdireccion = $("#txtdireccion").val();
			
			
			
			if(txtdescripcion == ""){
				$("#txtdescripcion").closest('.form-group').addClass('has-error');
				$("#txtdescripcion").after('<p class="text-danger">El campo Nombre Banco es requerido</p>');
			}else if (!letras(txtdescripcion)) {
				$("#txtdescripcion").closest('.form-group').addClass('has-error');
				$("#txtdescripcion").after('<p class="text-danger">Solo letras</p>');
			}else{
				$("#txtdescripcion").closest('.form-group').removeClass('has-error');
				$("#txtdescripcion").closest('.form-group').addClass('has-success');
			}

			if(file == ""){
				$("#file").closest('.form-group').addClass('has-error');
				$("#file").after('<p class="text-danger">El campo Imagen es requerido</p>');
			}else{
				$("#file").closest('.form-group').removeClass('has-error');
				$("#file").closest('.form-group').addClass('has-success');
			}			

			if(txtdireccion == ""){
				$("#txtdireccion").closest('.form-group').addClass('has-error');
				$("#txtdireccion").after('<p class="text-danger">El campo Dirección es requerido</p>');
			}else{
				$("#txtdireccion").closest('.form-group').removeClass('has-error');
				$("#txtdireccion").closest('.form-group').addClass('has-success');
			}

			//comprobacion de valores
			var cdescripcion=letras(txtdescripcion);
			if (!cdescripcion) {
				alertify.error("Verifique los datos");
				console.log(fileimagen);
			}else{

			//verificado datos vacios
			if(txtdescripcion && file && txtdireccion){
				event.preventDefault();
				$.ajax({
					url : form.attr('action'),
                    type : form.attr('method'),
                    data : new FormData(this),
                    dataType : 'json',
                    contentType:false,
                    processData:false,
                    success:function(response) {
                    	//remove el error
						$(".form-group").removeClass('has-error').removeClass('has-success');
						
						if(response.success == true){
							 $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

							 //resetaer el form
							 $("#createbancoform")[0].reset();
						 	//recargar las datatables funcion se crea a partir de las datables
						 	manejadordatosbanco.ajax.reload(null,false);
						 	$(".previsualizar").src="../../img/Sistema/anonymous.png";

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
				url: "../../Controlador/Banco/c_BancoDelete.php",
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

						manejadordatosbanco.ajax.reload(null,false);
						//cerrar ventana modal
						$("#eliminarbancoModal").modal('hide');

					       
					    
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
			url: "../../Controlador/s_Menu/c_MenuGetById.php",
			type: "post",
			data: {datos_id: id},
			dataType: "json",
			success:function(response){
				//console.log(response.output);
				$("#txtedescripcion").val(response.SIS04_Nombre);
				$("#txteurl").val(response.SIS04_Url);
				$("#txteicono").val(response.SIS04_Icono);
				$("#txteorden").val(response.SIS04_Orden);
				$("#txteestado").val(response.SIS04_Estado);
				//fin obtner

				//datos_id
				$(".editmenuModalid").append('<input type="hidden" name="d_id" id="d_id" value="'+response.SIS04_Id+'"/>');
					
				//here la actualizacion
				$("#updatemenuform").unbind('submit').bind('submit',function(){
					//rmover errores
					$(".text-danger").remove();

					var form =$(this);
					//validaciones
					
					var edescripcion = $("#edescripcion").val();	
					var eicono=$("#eicono").val()
					var eestado = $("#eestado").val();
					
					if(edescripcion == ""){
						$("#edescripcion").closest('.form-group').addClass('has-error');
						$("#edescripcion").after('<p class="text-danger">El campo descripcion es Requerido</p>');
					}else if (!letras(edescripcion)) {
						$("#edescripcion").closest('.form-group').addClass('has-error');
						$("#edescripcion").after('<p class="text-danger">Solo letras</p>');
					}else{
						$("#edescripcion").closest('.form-group').removeClass('has-error');
						$("#edescripcion").closest('.form-group').addClass('has-success');
					}

					if(eestado == ""){
						$("#eestado").closest('.form-group').addClass('has-error');
						$("#eestado").after('<p class="text-danger">El campo estado es Requerido</p>');
					}else{
						$("#eestado").closest('.form-group').removeClass('has-error');
						$("#eestado").closest('.form-group').addClass('has-success');
						
					}

					//comprobacion de valores
					var cedescripcion=letras(edescripcion);
					if (!cedescripcion) {
						alertify.error("Verifique los datos");
					}else{


					//verificado datos vacios
					if(edescripcion && eestado){
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

										manejadordatosmenu.ajax.reload(null,false);
										
										//remover el error
										$(".form-group").removeClass('has-success').removeClass('has-error');
										$(".text-danger").remove();
										
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

$("#file").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$("#file").val("");

  		alertify.error("Error al subir la imagen,¡La imagen debe estar en formato JPG o PNG!");
  		 /*swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });*/

  	}else if(imagen["size"] > 2000000){

  		$("#file").val("");

  		alertify.error("Error al subir la imagen,¡La imagen no debe pesar más de 2MB!");
  		/* swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });	*/

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})


        
   