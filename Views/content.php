<div class="row header bg-primary text-center ">
	<div class="line col-12 Shadow">
		<div class="title ">
			<span class="SCP"> <a href="/pruebatecnica" class="link">PRUEBA TÉCNICA</a> </span>
		</div>
		<div class="sub-title text-right">
			TEST - Araujo y Segovia
		</div>
	</div>
</div>
<div class="container content-box">
	<div class="row text-center">
		<div class="col-12 col-md-6 SignUp Shadow">
			<h2>CREA, VISUALIZA, EDITA Y ELIMINA PRODUCTOS EN NUESTRO SISTEMA</h2>
			  <!-- Trigger the modal with a button -->
		  
		</div>
		<div class="col-12 LogIn col-md-6 Shadow">
			<h2>¿Tienes una cuenta?</h2>
		  <!-- Trigger the modal with a button -->
		  <?php
		       if(isset($_SESSION['usuario'])) 
		        { 
		          echo '<a class="btn btn-outline-light btn-lg" href="?action=salir" >Salir</a>'; 
		        }else {
		          echo '<button type="button" class="btn btn-outline-light btn-lg" data-toggle="modal" data-target="#modalLogIn">Log In</button>';
		        }
		    ?>
		  
		  <?php
                // $enc -> ingresoController();
            ?>
		</div>	
	</div>
	
 </div>


 <!-- Modal Log In-->
	  <div class="modal fade" id="modalLogIn" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Log In</h4>
	        </div>
	        <div class="modal-body">
	          	<form method="post">
                  
                  <div class="form-group">
                    <label for="username" class="font-weight-bold">Email</label>
                    <input type="email" class="form-control" id="username" name="usuariolg" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" required=""/>
                  </div>
                  <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input class="form-control" id="password"  type="password" pattern="[A-Za-z0-9_-]{1,15}" name="passlg" required=""/>
                  </div>
                  <div>
                    <input type="submit" class="btn btn-outline-primary black font-weight-bold" name="" value="INICIAR SESIÓN">
                  </div>
                  
                </form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>


<div class="container content-box text-center" style="background-color: #ffffff; padding: 20px;"> 
 	<!--  -->
 	<main class="panel " id="main">
		<?php
		$enlace = new Enlaces();
		$enlace -> enlacesPanell();		    
	?>
	</main>
 	<!--  -->
 </div>