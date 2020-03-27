	//$(document).ready(function(){
		
	/*$("#addLogin").on('click',function(){	
		//resetear el form
		$("#loginform")[0].reset();

		//remove error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		//remove el mensage
			$(".messages").html("");
		//submit form
*/

		$("#loginform").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			

			var form = $(this);

			//validaciones
			var user = $("#txtusername").val();
			var pass =$("#txtpassword").val();
			
			
			if(user == ""){
				$("#txtusername").closest('.form-group').addClass('has-error');
				$("#txtusername").after('<p class="text-danger">El campo Usuario es Requerido</p>');
			}else{
				$("#txtusername").closest('.form-group').removeClass('has-error');
				$("#txtusername").closest('.form-group').addClass('has-success');				
			}

			if(pass == ""){
				$("#txtpassword").closest('.form-group').addClass('has-error');
				$("#txtpassword").after('<p class="text-danger">El campo Contraseña es Requerido</p>');
			}else{
				$("#txtpassword").closest('.form-group').removeClass('has-error');
				$("#txtpassword").closest('.form-group').addClass('has-success');				
			}
			


			//verificado datos vacios
			if(user&&pass){
				$.ajax({
					url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    cache: false,
                    dataType : 'json',
                    success:function(response) {
                    	//remove el error
						$(".form-group").removeClass('has-error').removeClass('has-success');
						
						if(response.success == true){
							 $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');
							 window.location.href = "../../View/Bienvenida/index.php";
							 //resetaer el form
							 //$("#loginfom")[0].reset();
						 	//recargar las datatables funcion se crea a partir de las datables
						 	//manejadordatosmenu.ajax.reload(null,false);
						}else{
							$(".messages").html('<div class="alert alert-danger alert-dismissible" role="alert">'+
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								'<strong><span class="glyphicon glyphicon-exclamation-sign"></span></strong>'+response.messages+
								'</div>');
						}//else
					} //succes
				});//ajax submit
			}//if

			return false;
		});//submit form create datos
	//}); //add modal	
	/*alert();
	});*/