///lamar AlertIOS.alert(title: string, message?: string, callbackOrButtons?: ?(() => void), ButtonsArray, type?: AlertType)
$(document).ready(function(){
	document.getElementById("txtmonto").disabled = true;
	document.getElementById("btnenviar").disabled = false;
	document.getElementById("rbcert").disabled=true;
	document.getElementById("rbcert").checked=true;
	document.getElementById("txtciiu").disabled=false;
	document.getElementById("rptcontinuar").style.display = 'none';;
});

function llamarmodal(){
	$("#preguntasModal").modal('show');     
};

function ruc(){
	var txtruc=$("#txtciiu").val();
	if (txtruc!="") {
		$.ajax({
			url: "../../Controlador/Evaluar/buscarpreguntas.php",
			type:"POST",
			dataType:"html",
			data:{busqueda:txtruc},
		})
		.done(function(resultado){
			if(resultado!=""){
				$("#datospreguntas").html(resultado);

			}else{
//alertify.error("No hay registros");
//$("#txtmonto").enable=false;
}
})
	}
}
//fin llama modal


$("#btnenviar").click(function(){
	var cont=0;
	var selected = [];
	$(":checkbox[name=rbcert]").each(function() {
		if (this.checked) {
// agregas cada elemento.
selected.push($(this).val());
cont=cont+1;
}
});
	var txtciiu = $("#txtciiu").val();
	var txtmonto = $("#txtmonto").val();
	$.ajax({
		url: "../../Controlador/Evaluar/buscar2.php",
		type:"POST",
		dataType:"html",
		data:{busqueda:txtciiu,monto:txtmonto,certi:cont},
	})
	.done(function(resultado){
		if(resultado!=""){
			$("#datoscon2").html(resultado);          
		}else{
//alertify.error("No hay registros");
//$("#txtmonto").enable=false;
}
})
});

$("#btncancelar").click(function(){
	$("#txtciiu").val("");
	$("#txtmonto").val("");
	$("#datospreguntas").html("");
	$("#datoscon1").html("");
	$("#datosp").html("");
	$("#datoscon2").html("");
	//$("#txtmonto").attr("disabled","false");
	document.getElementById("txtmonto").disabled = false;
	document.getElementById("btnenviar").disabled = false;
	document.getElementById("rbcert").disabled=false;
	document.getElementById("rbcert").checked=false;
	document.getElementById("txtciiu").disabled=false;
});

//$(obtener_registros());revisar codigo 
function obtener_registros(busqueda){
	$.ajax({
		url: "../../Controlador/Evaluar/c_buscar.php",
		type:"POST",
		dataType:"html",
		data:{busqueda:busqueda},
	})
	.done(function(resultado){
		if(resultado!=""){

//alertify.success(resultado);
//$("#txtciiu").attr("disabled","true");
$("#datosp").html(resultado);

}else{
	$("#datosp").html("");
	alertify.error("No hay registros");
//$("#txtmonto").enable=false;
}
})
}
$("#btnbuscar").click(function(){
//$(document).on('blur','#txtciiu',function(){
//$("#txtciiu").val(0);
//var valorbusqueda=$(this).val();
var valorbusqueda=$("#txtciiu").val();
if(valorbusqueda!=""){
	obtener_registros(valorbusqueda);
}else{
	alertify.error("El Ruc debe ser llenado");
}
});

//ventana modal
$("#btncontinuar").click(function(){
	var cont=0;
	var selected = [];
	$(":checkbox[name=rbsi]").each(function() {
		if (this.checked) {
// agregas cada elemento.
selected.push($(this).val());
cont=cont+1;
}
});
	if (cont>0) {
		$("#datoscon1").html('<br><div class="container"><div class="row"></div><div class="col-lg-6"><div class="alert alert-warning alert-dismissible" role="alert">No procede crédito porque se encuentra en lista de exclusión</div></div></div></div>');
		$("#txtmonto").attr("disabled","true");
		$("#btnenviar").attr("disabled","true");
		document.getElementById("rbcert").disabled=true;
		document.getElementById("txtciiu").disabled=true;
		document.getElementById("rptcontinuar").style.display = 'block';

	}else{
		alert("Continuar con los siguientes campos");
	}
	$("#preguntasModal").modal('hide');
});

$("#btncerrar").click(function(){
	$("#txtruc").val("");
});

//otras funcionalidad
function aceptar(){
	$(":checkbox[name=chkcontinuar]").each(function() {
		if (this.checked) {
	// agregas cada elemento.
			document.getElementById("txtmonto").disabled = false;
			document.getElementById("rbcert").disabled=false;
			document.getElementById("rbcert").checked=false;
			document.getElementById("btnenviar").disabled = false;
	
		}else{
			document.getElementById("txtmonto").disabled = true;
			document.getElementById("rbcert").disabled=true;
			document.getElementById("rbcert").checked=true;
			document.getElementById("btnenviar").disabled = true;
	
		}
	});
}