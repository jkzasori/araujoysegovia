<?php 
/**
 * 
 */
class Enlaces{
	
	public function template(){
		include("Views/template.php");
	}
	public function enlacesPanel(){
		$enlacep = isset($_GET['action'])?$_GET['action']:'';
		//esto sirve para heredar la clase Enlacepaginas y la función enlasPaginasLogin
		$respuesta = (new EnlaceModel) -> enlacePanelM($enlacep);
		include($respuesta);
	}
	public function enlacesPanell(){
			$enlacep = isset($_GET['action'])?$_GET['action']:'';
			//esto sirve para heredar la clase Enlacepaginas y la función enlasPaginasLogin
			$respuesta = (new EnlaceModel) -> enlacePanelMM($enlacep);

			include($respuesta);
	}
}
?>