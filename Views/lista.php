
 		

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-producto-tab" data-toggle="pill" href="#pills-producto" role="tab" aria-controls="pills-producto" aria-selected="true"><h3 class="text-black font-weight-bold" style="border-bottom: 1px solid white; margin-bottom: 5px; padding-bottom: 5px;">PRODUCTOS</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-categoria-tab" data-toggle="pill" href="#pills-categoria" role="tab" aria-controls="pills-categoria" aria-selected="false"><h3 class="text-black font-weight-bold" style="border-bottom: 1px solid white; margin-bottom: 5px; padding-bottom: 5px;">CATEGORIAS</h3></a>
  </li>
</ul>
<?php
	            $enc = new Admin();
	            $enc -> nuevoAdmin();
	      		$enc -> ingresoController();
	      		$p = new Producto();
	      		$p ->nuevoProducto();
	      		$p ->Delete_Crud();
	      		$c = new Categoria();
	      		$c->nuevaCategoria();
	      		?>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-producto" role="tabpanel" aria-labelledby="pills-producto-tab">
  	<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalProducto">Agrega Productor</button>
  	<div class="table-responsive">          
		   <table  id="tablaProducto" class="table table-striped table-bordered">
			    <thead>
			        <tr>
			        	<th>Código</th>
				        <th>Nombre</th>
				        <th>Descripción</th>
				        <th>Marca</th>
				        <th>Categoría</th>
				        <th>Precio</th>
				        <?php
					       if(isset($_SESSION['usuario'])) 
					        { 
					          echo '<th>Editar</th>
					          		<th>Eliminar</th>'; 
					        }
					    ?>
			        </tr>
			    </thead>
			    <tbody>
				    <?php 
             			
             			$p-> verProducto();
             		?>
				</tbody>
			</table>
		</div>
	</div>
  <div class="tab-pane fade" id="pills-categoria" role="tabpanel" aria-labelledby="pills-categoria-tab">
  			<?php
		       if(isset($_SESSION['usuario'])) 
		        { 
		          echo '<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalCategoria">Agregar Categoria</button>'; 
		        }else {
		          echo '';
		        }
		    ?>
  	<div class="table-responsive">          
		   <table  id="tablaCategoria" class="table table-striped table-bordered">
			    <thead>
			        <tr>
				        <th>Codigo</th>
				        <th>Nombre</th>
				        <th>Descripción</th>
				        <th>Activo</th>
				        <?php
		       if(isset($_SESSION['usuario'])) 
		        { 
		          echo '<th>Editar</th>'; 
		        }
		    ?>
			        </tr>
			    </thead>
			    <tbody>
				    <?php 
             			$c-> verCategoria();
             		?>
				</tbody>
			</table>
		</div>
  </div>
</div>
<div class="modal fade" id="modalProducto" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Producto</h4>
	        </div>
	        <div class="modal-body">
	          	<form method="post">
                  
                  <div class="form-group">
                  	<label for="codigoP" class="font-weight-bold">Código de Producto</label>
                    <input type="text" class="form-control" id="codigoP" minlength="4" maxlength="10" onkeypress="return check(event)" name="codigoP" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div class="form-group">
                  	<label for="nombreP" class="font-weight-bold">Producto</label>
                    <input type="text" class="form-control" minlength="4" maxlength="100" id="nombreP" name="nombreP" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div class="form-group">
                  	<label for="descripcionP" class="font-weight-bold">Descripción</label>
                  	<textarea class="form-control" id="descripcionP" maxlength="200" minlength="10" name="descripcionP" pattern="[A-Za-z0-9_-]{1,15}" required=""></textarea>
                  </div>
                  <div class="form-group">
                  	<label for="marcaP" class="font-weight-bold">Marca</label>
                    <input type="text" class="form-control" id="marcaP" name="marcaP" maxlength="50" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div class="form-group">
                  	<label for="precioP" class="font-weight-bold">Precio</label>
                    <input type="text" class="form-control" minlength="1" id="precioP" maxlength="10" pattern="{1,15}" onkeyup="this.value=Numeros(this.value)" name="precioP" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div>
                  	<?php
                  		$c->verCategoriaDato();
                  	?>
                  </div>
                  <div>
                    <input type="submit" class="btn btn-outline-primary black font-weight-bold" onclick="javascript:validate2();" name="" value="CREAR">
                  </div>
                  
                </form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
</div>


<div class="modal fade" id="modalDelete" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">ELIMINAR PRODUCTO</h4>
	        </div>
	          	<form method="post">
	          		<div class="modal-body">
	                  	<div class="">
					        <h5 class=" ">¿Seguro que desea eliminar el producto?</h5>
					      </div>
					      <div class=" white">
					        <input  type="text" name="idProducto" id="idProducto" hidden="">
					        <div class="input-field">
					          <input class="black-text " type="text" id="RegistroELimina" placeholder="ID del registro a Eliminar" hidden="" disabled="">
					          
					        </div>  
					      </div>
				      </div>
                   <div class="modal-footer">
			        	<input type="submit" name="" class="btn-danger" value="Eliminar" class=" btn col s12 ">
		      		<input type="button" name="" class="btn-primary" value="Cancelar" data-dismiss="modal"  class=" btn   col s12 ">
			        </div>
                </form>
	        
	       
	      </div>
	      
	    </div>
	    <!--Modal delete -->

</div>


<script type="text/javascript" src="Views/js/validate.js"></script>
<div class="modal fade" id="modalCategoria" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Agregar Categoria</h4>
	        </div>
	        <div class="modal-body">
	          	<form method="post">
                  <div class="form-group">
                  	<label for="codigoC" class="font-weight-bold">Código de Categoría</label>
                    <input type="text" class="form-control" id="codigoC" maxlength="10" onkeypress="return check(event)" name="codigoC" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div class="form-group">
                  	<label for="nombreC" class="font-weight-bold">Nombre de Categoría</label>
                    <input type="text" class="form-control" minlength="2" maxlength="100" id="nombreC" name="nombreC" pattern="[A-Za-z0-9_-]{1,15}" required=""/>
                  </div>
                  <div class="form-group">
                  	<label for="descripcionC" class="font-weight-bold">Descripción</label>
                  	<textarea class="form-control" id="descripcionC" maxlength="200" minlength="10" name="descripcionC" pattern="[A-Za-z0-9_-]{1,15}" required=""></textarea>
                  </div>
                  <div class="form-group">
				    <label for="activoC" class="font-weight-bold">Activo</label>
				    <select class="form-control" id="activoC" name="activoC">
				      <option value="1">Si</option>
				      <option value="0">No</option>
				    </select>
				  </div>
                  <div>
                    <input type="submit" onclick="javascript:validate();" class="btn btn-outline-primary black font-weight-bold" name="" value="CREAR">
                  </div>
                  
                </form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	    <!--Modal delete -->

</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
	$(document).on('mouseover','#elimina', function(){
              let idbutton=this.name;
              $('#idProducto').val(idbutton);
              $('#RegistroELimina').val(idbutton);
            });
          
</script>