//globalizamos a manejadordatoscat1
var manejadordatosusuario;

var mSortingString = []; 
var disableSortingColumn = 4;
//var disableSortingColumn = 5;
mSortingString.push({ "bSortable": false, "aTargets": [disableSortingColumn] }); 
$(document).ready(function(){
	manejadordatosusuario =$("#manejadordatosusuario").DataTable({
		"ajax" : "../../Controlador/Usuario/c_UsuarioGet.php",
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
            },
            "aoColumnDefs": mSortingString,
     //        "columns": [
			  //   { "searchable": false },
			  //   disableSortingColumn			    
			  // ]
	});
	$("#adddatosModalBtn").on('click',function(){
		//resetear el form
		$("#createusuform")[0].reset();

		//remove error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		//remove el mensage
			$(".messages").html("");
		//submit form


		$("#createusuform").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			

			var form = $(this);

			//validaciones
			var txtdescripcion = $("#txtdescripcion").val();
			var txturl = $("#txturl").val();
			var txticono =$("#txticono").val();
			var txtorden = $("#txtorden").val();
			
			
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
			if(txtdescripcion && txturl && txticono && txtorden ){
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
							 $("#createusuform")[0].reset();
						 	//recargar las datatables funcion se crea a partir de las datables
						 	manejadordatosusu.ajax.reload(null,false);
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
				url: "../../Controlador/s_Menu/c_MenuDelete.php",
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

						manejadordatosmenu.ajax.reload(null,false);
						//cerrar ventana modal
						$("#eliminarmenuModal").modal('hide');

					       
					    
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
				$("#ddleestado").val(response.SIS04_Estado);
				//fin obtner

				//datos_id
				$(".editmenuModalid").append('<input type="hidden" name="d_id" id="d_id" value="'+response.SIS04_Id+'"/>');
					
				//here la actualizacion
				$("#updatemenuform").unbind('submit').bind('submit',function(){
					//rmover errores
					$(".text-danger").remove();

					var form =$(this);
					//validaciones
					
					var txtedescripcion = $("#txtedescripcion").val();	
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
					if(txtedescripcion && txteurl && txteicono && txteorden && ddleestado){
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

$('#ddlbanco').select2({
	search: true,
	 placeholder: "Busca algun banco",
	 width: '100%'
 });
        
   