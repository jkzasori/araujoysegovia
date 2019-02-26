<?php  
/**
 * 
 */
class Admin{
	
	function nuevoAdmin(){//Crear nuevo Usuario.
		if (empty($_POST['usuario']) || empty($_POST['password'])) {
			//echo "campos vacios";
		}else{
			$resultado = (new AdminModel) -> nuevoAdminM($_POST['usuario'], $_POST['password']);
			echo "".$resultado;	
		}
	}

	function ingresoController(){
	//lo de los corchetes de las respuestas hace referenciua a los nombres de las finlas en la base de datos
		if ( empty($_POST['usuariolg']) || empty($_POST['passlg'])) {
			//echo "Varibles vacias";
		}else{
			
			$respuesta = (new AdminModel) -> ingresoM($_POST['usuariolg'], $_POST['passlg']);
			if (strtolower($respuesta["usuario"]) == strtolower($_POST['usuariolg']) && $respuesta["password"] == $_POST['passlg']) {	
				echo "<span class=''>Salió</span>";
				if($_SESSION['usuario']){
					echo '<br>';
					if (empty($_GET['Tid'])) {
						header('Location: ?');	
					}else{
						header('Location: ?action=cartelera&Tid='.$_GET['Tid']);
					}
					
					}
			}else{
					echo "<span class='noti'>Verifique sus datos<br> ".$respuesta['usuario']."</span>";
					}
			}	
	}
	function oneUser(){
		if (empty($_GET['Cid'])) {	
		}else{
			$idcustomer=$_GET['Cid'];
			$customer = (new AdminModel) -> oneUserM($idcustomer);
			return $customer;
		}
	}
}
?>