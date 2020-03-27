function emptysol(valor){
    conf=false;

    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
        //alertify.error('Campos vacíos');
        conf = false;
    }else{
        conf=true;
    }
    return conf;
}

function doscampos(loc, val){
    bool1=emptysol(loc);
    bool2=emptysol(val);
    respuesta=false;
    if(bool1&&bool2){
        respuesta = true    
    } else if(!bool1&&!bool2){
        respuesta = true;
    }else {
        respuesta = false;
    }

    return respuesta;
}

function parlleno(dato){
            var conf= new Array();
            //verificación de par correcto de ingreso de datos
            for(i=0;i<dato.length;i+=2){
                //alert(i);
                bool1=emptysol(dato[i]);
                bool2=emptysol(dato[i+1]);
                if(bool1&&bool2){
                    if(i==0){
                        conf[i]=true;    
                    }else{
                        div=i/2;
                        conf[div]=true;
                    }
                    
                } else {
                    if(i==0){
                        conf[i]=false;    
                    }else{
                        div=i/2;
                        conf[div]=false;
                    }
                }
            }

            respuesta=false;
            //verificar que por lo menos un par esté lleno
            for(i=0;i<conf.length;i++){
                //alert(conf[i]);
                if(conf[i]==true){
                    /*alert('true');
                    return true;*/
                    respuesta=true;
                    break;
                }else{
                    /*alert('false');
                    return false;*/
                    respuesta=false;
                }
            }
            return respuesta;
}

function empty(valor){
	conf=false;

	long=valor.length;

	for(i=0;i<long;i++){
		if( valor[i] == null || valor[i].length == 0 || /^\s+$/.test(valor[i]) ) {
 			//alertify.error('Campos vacíos');
 			conf = false;
 			break;
		}else{
			conf=true;
		}
	}
	return conf;
}

function letras(dato){

	regex = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;

	if(regex.test(dato)) {
 		return true;
 	} else{
 		return false;
 	}
}

function email(dato){
	if(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(dato) ) {
  		return true;
	}else {
		return false;
	}	
}

function celular(dato){
	if (/^([0-9])*$/.test(dato)) {
  		var arrn=Array.from(dato);

		ver=arrn[0]+arrn[1];
			
		if(ver==9 && dato.length==10){
			return true;
		}else {
			return false;
		}
	}else {
		return false;
	}	
}

function telefono(dato){
	if (/^([0-9])*$/.test(dato)) {
  		var arrn=Array.from(dato);

		ver=arrn[0]+arrn[1];
			
		if((ver>=2 && ver<=7) && dato.length==9){
			return true;
		}else {
			return false;
		}
	}else {
		return false;
	}	
}

function cedruc (ced) {
            //var campo = cel;

            numero = ced;
            var suma = 0;
            var residuo = 0;
            var pri = false;
            var pub = false;
            var nat = false;
            var modulo = 11;

            /* Verifico que el campo no contenga letras */
            var ok=1;
            prov = numero.substr(0, 2);
            
            if (prov >= 1 && prov <= 24) {

                /* Aqui almacenamos los digitos de la cedula en variables. */
                d1 = numero.substr(0, 1);
                d2 = numero.substr(1, 1);
                d3 = numero.substr(2, 1);
                d4 = numero.substr(3, 1);
                d5 = numero.substr(4, 1);
                d6 = numero.substr(5, 1);
                d7 = numero.substr(6, 1);
                d8 = numero.substr(7, 1);
                d9 = numero.substr(8, 1);
                d10 = numero.substr(9, 1);

                /* El tercer digito es: */
                /* 9 para sociedades privadas y extranjeros */
                /* 6 para sociedades publicas */
                /* menor que 6 (0,1,2,3,4,5) para personas naturales */

                if (d3 == 7 || d3 == 8) {
                    //alert('El tercer dígito ingresado es inválido');
                    return false;
                }

                /* Solo para personas naturales (modulo 10) */
                if (d3 < 6) {
                    nat = true;
                    p1 = d1 * 2; if (p1 >= 10) p1 -= 9;
                    p2 = d2 * 1; if (p2 >= 10) p2 -= 9;
                    p3 = d3 * 2; if (p3 >= 10) p3 -= 9;
                    p4 = d4 * 1; if (p4 >= 10) p4 -= 9;
                    p5 = d5 * 2; if (p5 >= 10) p5 -= 9;
                    p6 = d6 * 1; if (p6 >= 10) p6 -= 9;
                    p7 = d7 * 2; if (p7 >= 10) p7 -= 9;
                    p8 = d8 * 1; if (p8 >= 10) p8 -= 9;
                    p9 = d9 * 2; if (p9 >= 10) p9 -= 9;
                    modulo = 10;
                }

                    /* Solo para sociedades publicas (modulo 11) */
                    /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
                else if (d3 == 6) {
                    pub = true;
                    p1 = d1 * 3;
                    p2 = d2 * 2;
                    p3 = d3 * 7;
                    p4 = d4 * 6;
                    p5 = d5 * 5;
                    p6 = d6 * 4;
                    p7 = d7 * 3;
                    p8 = d8 * 2;
                    p9 = 0;
                }

                    /* Solo para entidades privadas (modulo 11) */
                else if (d3 == 9) {
                    pri = true;
                    p1 = d1 * 4;
                    p2 = d2 * 3;
                    p3 = d3 * 2;
                    p4 = d4 * 7;
                    p5 = d5 * 6;
                    p6 = d6 * 5;
                    p7 = d7 * 4;
                    p8 = d8 * 3;
                    p9 = d9 * 2;
                }

                suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
                residuo = suma % modulo;

                /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
                digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

                /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
                if (pub == true) {
                    if (digitoVerificador != d9) {
                        //alert('El ruc de la empresa del sector público es incorrecto.');
                        return false;
                    }
                    /* El ruc de las empresas del sector publico terminan con 0001*/
                    if (numero.substr(9, 4) != '0001') {
                        //alert('El ruc de la empresa del sector público debe terminar con 0001');
                        return false;
                    }
                }
                else if (pri == true) {
                    if (digitoVerificador != d10) {
                        //alert('El ruc de la empresa del sector privado es incorrecto.');
                        return false;
                    }
                    if (numero.substr(10, 3) != '001') {
                        //alert('El ruc de la empresa del sector privado debe terminar con 001');
                        return false;
                    }
                }

                else if (nat == true) {
                    if (digitoVerificador != d10) {
                        //alert('El número de cédula de la persona natural es incorrecto.');
                        return false;
                    }
                    if (numero.length > 10 && numero.substr(10, 3) != '001') {
                        //alert('El ruc de la persona natural debe terminar con 001');
                        return false;
                    }
                }
                return true;
            } else {
                //alert('El código de la provincia (dos primeros dígitos) es inválido'); 
                return false;
            }
}

function cont_val(dato){
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/;
    if(regex.test(dato)){
        return true;
    }else{
        return false;
    }
}

function numdec(num){
    conf=false;
    if(/^[0-9]+([.][0-9]+)?$/.test(num)){
        //alert(num+' decimal');
        if(num>0){
            //return true;
            conf=true;
        }else{
            //return false;
            conf=false;
        }
        
    }else if(num.length==0){
        //return true;
        conf=true;
    }else{
        //alert(num+' no decimal');
        //return false;
        conf=false;
    }
    return conf;
}

function numero(num){
    conf=false;
    if (/^([0-9])*$/.test(num)&&num.length>0) {
        //alert('numero');
        if(num>0){
            //return true;
            conf=true;
        }else{
            //return false;
            conf=false;
        }
        
    }else if(num.length==0){
        conf=true;
    }else {
        //alert('no número');
        //return false;
        conf=false;
    }   
    return conf;
}

function numdecu(num){
    conf=false;
    if(/^[0-9]+([.][0-9]+)?$/.test(num)){
        //alert(num+' decimal');
        if(num>=0){
            //return true;
            conf=true;
        }else{
            //return false;
            conf=false;
        }
        
    }else if(num.length==0){
        //return true;
        conf=true;
    }else{
        //alert(num+' no decimal');
        //return false;
        conf=false;
    }
    return conf;
}

function numerou(num){
    conf=false;
    if (/^([0-9])*$/.test(num)&&num.length>0) {
        //alert('numero');
        if(num>=0){
            //return true;
            conf=true;
        }else{
            //return false;
            conf=false;
        }
        
    }else if(num.length==0){
        conf=true;
    }else {
        //alert('no número');
        //return false;
        conf=false;
    }   
    return conf;
}