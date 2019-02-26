<?php  
/**
 * 
 */
class Producto{
	function verProducto(){
		$respuesta = (new ProductoModel) -> verProductoM();
		while ($v= $respuesta->fetch_array(MYSQLI_BOTH)) {
				echo '
				<tr>
				    <td class="center blueT">'.$v["codigo"].'</td>
                    <td class="center blueT">'.$v["nombre"].'</td>
                    <td class="center blueT">'.$v["descripcion"].'</td>
                    <td class="center blueT">'.$v["marca"].'</td>';
                    $resultado = (new CategoriaModel) -> oneCategoriaM($v["categoria_id"]);
                    echo'
                     <td class="center blueT">'.$resultado["nombre"].'</td>
                    <td class="center blueT">'.$v["precio"].'</td>';
                    if(isset($_SESSION['usuario'])) 
		        { 
		          echo '<td class="center blueT"><a type="" href="Views/updateP.php?idP='.$v["id"].'" name="'.$v["id"].'" id="update" class="btn">Update</a></td>
		          <td class="center blueT"><a type="" data-toggle="modal" data-target="#modalDelete" href="" name="'.$v["id"].'" id="elimina" class="waves-effect waves-light btn modal-trigger">Delete</a></td>'; 
		        }
		        echo'
                </tr> ';
          }
	}
	function oneProducto(){//Regresa un producto
		if (empty($_GET['Tid'])) {	
		}else{
			$idtheater=$_GET['Tid'];
			$theater = (new ProductoModel) -> oneProductoM($idtheater);
			return $theater;
		}
	}
	function nuevoProducto(){//Crear nueva Usuario.
		if (empty($_POST['codigoP']) || empty($_POST['nombreP']) || empty($_POST['descripcionP']) || empty($_POST['marcaP']) || empty($_POST['categoriaP']) || empty($_POST['precioP'])) {
			//echo "campos vacios";
		}else{
			$resultado = (new ProductoModel) -> nuevoProductoM($_POST['codigoP'], $_POST['nombreP'], $_POST['descripcionP'], $_POST['marcaP'], $_POST['categoriaP'], $_POST['precioP']);
			echo "".$resultado;	
		}
	}
		function producto_id(){
		if (empty($_GET['idP'])){

		}else{
			$resultado = (new ProductoModel) -> oneProductoM($_GET['idP']);
			echo '<form method="post">
				<div class="form-group">
                  	<label for="codigoP" class="font-weight-bold">Código de Producto</label>
                    <input type="text" class="form-control" id="codigoP" minlength="4" maxlength="10" onkeypress="return check(event)" name="codigoP" pattern="[A-Za-z0-9_-]{1,15}" value="'.$resultado["codigo"].'" required=""/>
                  </div>
				<div class="form-group">
                  	<label for="nombreP" class="font-weight-bold">Nombre del Producto</label>
                    <input type="text" class="form-control" minlength="4" id="nombreP" name="nombreP" maxlength="100" value="'.$resultado["nombre"].'" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div class="form-group">
                  	<label for="descripcionP" class="font-weight-bold">Descripción</label>
                  	<textarea class="form-control" id="descripcionP" maxlength="200" minlength="10" name="descripcionP" pattern="[A-Za-z0-9_-]{1,15}" required="">'.$resultado["descripcion"].'</textarea>
                  </div>
                   <div class="form-group">
                  	<label for="marcaP" class="font-weight-bold">Marca</label>
                    <input type="text" class="form-control" id="marcaP" name="marcaP" maxlength="50" value="'.$resultado["marca"].'" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                   <div class="form-group">
                  	<label for="precioP" class="font-weight-bold">Precio</label>
                    <input type="text" class="form-control" minlength="1" id="precioP" pattern="{1,15}" maxlength="10" value="'.$resultado["precio"].'" onkeyup="this.value=Numeros(this.value)" name="precioP" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>';
                  $respuesta = (new CategoriaModel) -> verCategoriaM();
		echo '
				<div class="form-group">
				    <label for="categoriaP" class="font-weight-bold">Categoría</label>
				    <select class="form-control" id="categoriaP" name="categoriaP">';
					while ($v= $respuesta->fetch_array(MYSQLI_BOTH)) {
							if($v["id"]==$resultado["categoria_id"]){
								echo '<option selected="" value="'.$v["id"].'">'.$v["nombre"].'</option>';	
							}else{
								echo '<option value="'.$v["id"].'">'.$v["nombre"].'</option>';	
							}
			          }
           echo '</select>
				</div>';
                  	echo'
			        <input type="submit" onclick="javascript:validate();" class="btn btn-outline-primary black font-weight-bold" name="" value="EDITAR">
			      </form> ';
		}
		
	}
	function editarProducto(){
		if (empty($_GET['idP']) || empty($_POST['codigoP']) || empty($_POST['nombreP']) || empty($_POST['descripcionP']) || empty($_POST['marcaP']) || empty($_POST['precioP'])) {
			
		}else{
			$resultado = (new ProductoModel) -> Update_Producto($_GET['idP'], $_POST['codigoP'], $_POST['nombreP'], $_POST['descripcionP'], $_POST['marcaP'], $_POST['categoriaP'], $_POST['precioP']);
			echo "".$resultado;
		}
	}
	function Delete_Crud(){

		if (empty($_POST['idProducto'])) {
			
		}else{
			//echo "string".$_POST['idProducto'];
			$resultado = (new ProductoModel) -> Delete_Crud($_POST['idProducto']);
			echo "".$resultado;
		}
	}
}
?>