<?php
/**
* 
*/
require_once("coneccion.php");

class ProductoModel{

	function verProductoM(){
		$conec = new Coneccion();//
	  $mysqlit=$conec->conectar();
	  $mysqlit->set_charset('utf8');
		$sqlt = $mysqlit->prepare("SELECT * FROM producto order by id desc");		
		//Ahora ejecutamos la consulta
		$sqlt -> execute();
		//obtenemos los resultados que nos arroja
		$resul=$sqlt->get_result();
		return $resul;	
		$sqlt -> close();	
	}

	function oneProductoM($id){
		$conec = new Coneccion();//
	  	$mysqlit=$conec->conectar();
	  	$mysqlit->set_charset('utf8');
		$sqlt = $mysqlit->prepare("SELECT * FROM producto where id=?");
		$sqlt->bind_param("s", $id);
		//Ahora ejecutamos la consulta
		$sqlt -> execute();
		//obtenemos los resultados que nos arroja
		$resul=$sqlt->get_result();
		$Producto=$resul->fetch_array(MYSQLI_BOTH);
		return $Producto;	
		}
	function nuevoProductoM($codigo, $nombre, $descripcion, $marca, $categoria_id, $precio){
		$conect = new Coneccion();
		$mysqli = $conect -> conectar();
		$mysqli -> set_charset('utf8');
		//primero se comprueba que ni el nombre ni el código existan y si no existen se realiza el registro
		$mysqlver = $mysqli->prepare("SELECT * FROM producto WHERE codigo=? || nombre=?");
		$mysqlver-> bind_param('ss',$codigo, $nombre);		
			//Ahora ejecutamos la consulta
		$mysqlver -> execute();
		$mysqlver -> store_result();
		$idadmin=$_SESSION['usuario']['id'];
		$categoria_id=1;
		if ($mysqlver->num_rows>0) {
			return "<br><span class='noti'>Error, el nombre o el código del producto ya existen en el sistema. Intente con otro.</span>";
		}else{
		
			$mysql = $mysqli -> prepare("INSERT INTO producto(id, codigo, nombre, descripcion, marca, categoria_id, precio, admin_id) VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)");
			$mysql-> bind_param('ssssidi',$codigo, $nombre, $descripcion, $marca, $categoria_id, $precio, $idadmin);
			if ($mysql -> execute()) {
				return "<br><span class='noti'>Registro Exitoso.</span>";
			}else{
					return "<br><span class='noti'>Error al realizar el Registro.</span>";
				}
		}
	}
	function Update_Producto($id, $codigo, $nombre, $descripcion, $marca, $categoria_id, $precio){
		$conect = new Coneccion();
		$mysql = $conect->conectar();
		$mysql->set_charset('utf8');
		echo "".$codigo ."-".$nombre."-". $descripcion."-". $marca."-". $categoria_id."-". $precio ."-".$id."";
		$mysqli = $mysql->prepare("UPDATE producto SET codigo=?, nombre=?, descripcion=?, marca=?, categoria_id=?, precio=? WHERE id=?");
		$mysqli -> bind_param('ssssidi', $codigo, $nombre, $descripcion, $marca, $categoria_id, $precio, $id);
		if ($mysqli -> execute()) {
			header('Location: /pruebatecnica');
			return "<h3>Registro actualizado éxitosamente.</h3>";
		}else{
			return "<h3>Error al actualizar el peoducto.</h3>";

		}	
	}
	function Delete_Crud($id){
		$conect = new Coneccion();
		$mysql = $conect->conectar();
		$mysql -> set_charset('utf8');
		$mysqli = $mysql-> prepare("DELETE FROM producto WHERE id=?");
		$mysqli -> bind_param("i", $id);
		if ($mysqli -> execute()) {
			return "<h3>Producto eliminado exitosamente.</h3>";
		}else{
			return "<h3>Error al eliminar el Producto.</h3>";
		}
	}

}
?>