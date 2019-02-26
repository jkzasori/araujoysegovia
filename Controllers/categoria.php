<?php  
/**
 * 
 */
class Categoria{
	function verCategoria(){
		$respuesta = (new CategoriaModel) -> verCategoriaM();
		while ($v= $respuesta->fetch_array(MYSQLI_BOTH)) {
				echo '
				<tr>
                    <td class="center blueT">'.$v["codigo"].'</td>
                    <td class="center blueT">'.$v["nombre"].'</td>
                    <td class="center blueT">'.$v["descripcion"].'</td>
                    <td class="center blueT">';
                    if($v["activo"]==1){
                    	echo "Si";
                    }else{
                    	echo "No";
                    }
                    echo '</td>';
                     if(isset($_SESSION['usuario'])) 
		        { 
		          echo '<td class="center blueT"><a type="" href="Views/updateC.php?idC='.$v["id"].'" name="'.$v["id"].'" id="update" class="btn">Update</a></td>'; 
		        }
                    echo '
                </tr> ';
          }
	}
	function oneCategoria(){//Regresa una categoria
		if (empty($_GET['Tid'])) {	
		}else{
			$idtheater=$_GET['Tid'];
			$theater = (new CategoriaModel) -> oneCategoriaM($idtheater);
			return $theater;
		}
	}
	function nuevaCategoria(){//Crear nueva Usuario.
		if (empty($_POST['codigoC']) || empty($_POST['nombreC']) || empty($_POST['descripcionC']) || empty($_POST['activoC'])) {
			//echo "campos vacios";
		}else{
			$resultado = (new CategoriaModel) -> nuevaCategoriaM($_POST['codigoC'], $_POST['nombreC'], $_POST['descripcionC'], $_POST['activoC']);
			echo "".$resultado;	
		}
	}
	function categoria_id(){
		if (empty($_GET['idC'])){

		}else{
			$resultado = (new CategoriaModel) -> oneCategoriaM($_GET['idC']);
			echo '<form method="post">
				<div class="form-group">
                  	<label for="codigoC" class="font-weight-bold">Código de Categoría</label>
                  	 <input type="text" class="form-control" id="codigoC" maxlength="10" onkeypress="return check(event)" name="codigoC" value="'.$resultado["codigo"].'" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                 </div>
                 <div class="form-group">
                  	<label for="nombreC" class="font-weight-bold">Nombre de Categoría</label>
                  	<input type="text" class="form-control" minlength="2" maxlength="100" id="nombreC" name="nombreC" pattern="[A-Za-z0-9_-]{1,15}" value="'.$resultado["nombre"].'" required=""/>
			    </div>
			    <div class="form-group">
                  	<label for="descripcionC" class="font-weight-bold">Descripción</label><textarea class="form-control" id="descripcionC" maxlength="200" minlength="10" name="descripcionC" pattern="[A-Za-z0-9_-]{1,15}" required="">'.$resultado["descripcion"].'</textarea>
                </div>
                <div class="form-group">
				    <label for="activoC" class="font-weight-bold">Activo</label>
				    <select class="form-control" id="activoC" name="activoC">';
				    if ($resultado["activo"]==1) {
				    	echo '<option selected="" value="1">Si</option>
				    	<option value="0">No</option>';
				    }else{
				    		echo '<option value="1">Si</option>
				    	<option selected=""  value="0">No</option>';
				    }
				      
				      
				    echo '</select>
				</div>
			        <input type="submit" onclick="javascript:validate();" class="btn btn-outline-primary black font-weight-bold" name="" value="EDITAR">
			      </form> ';
		}
		
	}
	function verCategoriaDato(){
		$respuesta = (new CategoriaModel) -> verCategoriaM();
		echo '
				<div class="form-group">
				    <label for="categoriaP" class="font-weight-bold">Categoría</label>
				    <select class="form-control" id="categoriaP" name="categoriaP">';
		while ($v= $respuesta->fetch_array(MYSQLI_BOTH)) {
			if ($v["activo"]!=0) {
				echo '<option value="'.$v["id"].'">'.$v["nombre"].'</option>';	
			}
          }
           echo '</select>
				</div>';
	}
	function editarCategoria(){

		if (empty($_GET['idC']) || empty($_POST['codigoC']) || empty($_POST['nombreC']) || empty($_POST['descripcionC'])) {
			
		}else{
			$resultado = (new CategoriaModel) -> Update_Categoria($_GET['idC'], $_POST['codigoC'], $_POST['nombreC'], $_POST['descripcionC'], $_POST['activoC']);
			echo "".$resultado;
		}
	}

}
?>