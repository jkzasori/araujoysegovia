<?php
/**
* 
*/
require_once("coneccion.php");

class CategoriaModel{

	function verCategoriaM(){
		$conec = new Coneccion();//
	  $mysqlit=$conec->conectar();
	  $mysqlit->set_charset('utf8');
		$sqlt = $mysqlit->prepare("SELECT * FROM categoria order by id desc");		
		//Ahora ejecutamos la consulta
		$sqlt -> execute();
		//obtenemos los resultados que nos arroja
		$resul=$sqlt->get_result();
		return $resul;	
		$sqlt -> close();	
	}
	function oneCategoriaM($id){
		$conec = new Coneccion();//
	  	$mysqlit=$conec->conectar();
	  	$mysqlit->set_charset('utf8');
		$sqlt = $mysqlit->prepare("SELECT * FROM categoria where id=?");
		$sqlt->bind_param("s", $id);
		//Ahora ejecutamos la consulta
		$sqlt -> execute();
		//obtenemos los resultados que nos arroja
		$resul=$sqlt->get_result();
		$Categoria=$resul->fetch_array(MYSQLI_BOTH);
		return $Categoria;	
		}
	function nuevaCategoriaM($codigo, $nombre, $descripcion, $activo){
		$conect = new Coneccion();
		$mysqli = $conect -> conectar();
		$mysqli -> set_charset('utf8');
		//primero se comprueba que ni el nombre ni el código existan y si no existen se realiza el registro
		$mysqlver = $mysqli->prepare("SELECT * FROM categoria WHERE codigo=? || nombre=?");
		$mysqlver-> bind_param('ss',$codigo, $nombre);		
			//Ahora ejecutamos la consulta
		$mysqlver -> execute();
		$mysqlver -> store_result();
		$idadmin=$_SESSION['usuario']['id'];
		if ($mysqlver->num_rows>0) {
			return "<br><span class='noti'>Error, el nombre o el código de la categoría ya existen en el sistema. Intente con otro.</span>";
		}else{
		
			$mysql = $mysqli -> prepare("INSERT INTO categoria(id, codigo, nombre, descripcion, activo, admin_id) VALUES(NULL, ?, ?, ?, ?, ?)");
			$mysql-> bind_param('sssis',$codigo, $nombre, $descripcion, $activo, $idadmin);
			if ($mysql -> execute()) {
				return "<br><span class='noti'>Registro Exitoso.</span>";
			}else{
					return "<br><span class='noti'>Error al realizar el Registro.</span>";
				}
		}
	}
	function Update_Categoria($id, $codigoC, $nombreC, $descripcionC, $activoC){
		$conect = new Coneccion();
		$mysql = $conect->conectar();
		$mysql->set_charset('utf8');
		$mysqli = $mysql->prepare("UPDATE categoria SET codigo=?, nombre=?, descripcion=?, activo=? WHERE id=?");
		$mysqli -> bind_param('sssii', $codigoC, $nombreC, $descripcionC, $activoC, $id);
		if ($mysqli -> execute()) {
			header('Location: /pruebatecnica');
			return "<h3>Registro actualizado éxitosamente.</h3>";
		}else{
			return "<h3>Error al actualizar el registro.</h3>";

		}	
	}

}
?>