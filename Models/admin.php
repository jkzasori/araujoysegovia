<?php  
/**
 * 
 */
require_once("coneccion.php");
class AdminModel{
	function nuevoAdminM($usuario, $password){
		$conect = new Coneccion();
		$mysqli = $conect -> conectar();
		$mysqli -> set_charset('utf8');
		//primero se comprueba que el usuario  no exista y si no existe se realiza el registro
		$mysqlver = $mysqli->prepare("SELECT * FROM admin WHERE usuario=?");
		$mysqlver-> bind_param('s',$usuario);		
			//Ahora ejecutamos la consulta
		$mysqlver -> execute();
		$mysqlver -> store_result();
		if ($mysqlver->num_rows>0) {
			return "<br><span class='noti'>Error, el usuario ya existe en el sistema. Intente con otro.<span>";
		}else{
			$mysql = $mysqli -> prepare("INSERT INTO admin(id, usuario, password, Fecha_registro) VALUES(NULL, ?, ?, CURDATE())");
			$mysql-> bind_param('ss',$usuario, $password);
			if ($mysql -> execute()) {
				return "<br><span class='noti'>Registro Exitoso.</span>";
			}else{
					return "<br><span class='noti'>Error al realizar el Registro.</span>";
				}
		}
	}

function ingresoM($usuario, $password){
	 $conec = new Coneccion();//
    $mysqlit=$conec->conectar();
    $mysqlit->set_charset('utf8');
	 if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		if($sqlt = $mysqlit->prepare("SELECT * FROM admin WHERE usuario= ? AND password= ?"))
		{
			$sqlt -> bind_param("ss",$usuario ,$password);
			//Ahora ejecutamos la consulta
			$sqlt -> execute();
			//obtenemos los resultados que nos arroja
			$resul=$sqlt->get_result();
				if ($resul->num_rows==1) {
					$datos=$resul->fetch_assoc();
					//Creamos variables de sesion para guardar todos los datos
					$_SESSION['usuario']=$datos;
					return $datos;
				}else{
					echo "<span class=''><br>No se puede conectar<br></span>";

				}
				
				$sqlt -> close();
		}
	}

	function oneUserM($iduser){
		$conec = new Coneccion();//
	  	$mysqlit=$conec->conectar();
	  	$mysqlit->set_charset('utf8');
		$sqlt = $mysqlit->prepare("SELECT * FROM admin where id=?");
		$sqlt->bind_param("i", $iduser);
		//Ahora ejecutamos la consulta
		$sqlt -> execute();
		//obtenemos los resultados que nos arroja
		$resul=$sqlt->get_result();
		$Customer=$resul->fetch_array(MYSQLI_BOTH);
		return $Customer;	
	}
}
?>