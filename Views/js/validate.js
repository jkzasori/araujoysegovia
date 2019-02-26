
			function validate2(){
               if (document.getElementById("descripcionP").value == "" || document.getElementById("marcaP").value == "" || document.getElementById("nombreP").value == "" || document.getElementById("codigoP").value == "" || document.getElementById("precioP").value == ""){
                   alert("Ninguno de los campos puede estar vacio");
               }else if (document.getElementById("codigoP").value.trim()==""){
			        alert("el Código no admiten espacios en blanco ni caracteres especiales");
			    }
            }
            function validate(){
               if (document.getElementById("descripcionC").value == "" || document.getElementById("codigoC").value == "" || document.getElementById("nombreC").value == ""){
                   alert("Ninguno de los campos puede estar vacio");
               }else if (document.getElementById("codigoC").value.trim()==""){
			        alert("el Código no admiten espacios en blanco ni caracteres especiales");
			    }
            }
            function Numeros(string){//Solo numeros
				    var out = '';
				    var filtro = '1234567890';//Caracteres validos
					
				    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
				    for (var i=0; i<string.length; i++)
				       if (filtro.indexOf(string.charAt(i)) != -1) 
				             //Se añaden a la salida los caracteres validos
					     out += string.charAt(i);
					
				    //Retornar valor filtrado
				    return out;
				}
            function check(e) {
			    tecla = (document.all) ? e.keyCode : e.which;

			    //Tecla de retroceso para borrar, siempre la permite
			    if (tecla == 8) {
			        return true;
			    }

			    // Patron de entrada, en este caso solo acepta numeros y letras
			    patron = /[A-Za-z0-9]/;
			    tecla_final = String.fromCharCode(tecla);
			    return patron.test(tecla_final);
			}
