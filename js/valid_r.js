with(document.registro_usuario_bd){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
        if(ok &&nombre_completo.value==""){
			ok=false;
			alert("Debe escribir su nombre");
			nombre_completo.focus();
		}
        if(ok &&correo.value==""){
			ok=false;
			alert("Debe escribir su nombre");
			correo.focus();
		}
		if(ok && contraseña.value ==""){
			ok=false;
			alert("Debe escribir su password");
			contraseña.focus();
		}
		if(ok && conf_contraseña.value==""){
			ok=false;
			alert("Debe reconfirmar su password");
			conf_contraseña.focus();
		}  

		if(ok && contraseña.value!= conf_contraseña.value){
			ok=false;
			alert("Los passwords no coinciden");
			conf_contraseña.focus();
		}


		if(ok){ submit(); }
	}
}
