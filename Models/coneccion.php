<?php
class Coneccion{
	public function conectar(){
		
		$mysqli = new mysqli('localhost','root','','pruebaTecnicaTamara');
		return $mysqli;
	}
	
}

?>