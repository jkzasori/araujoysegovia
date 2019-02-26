<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Prueba Técnica</title>
	<!-- Meta tags-->
	<meta name="description" content="Sistema de Calificación para peliculas">
	<meta name="keywords" content="CINE, cine, calificación de películas, sistema de películas, test">
	<meta name="author" content="José Támara">
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<!-- CSS -->
   <link rel="stylesheet" type="text/css" href="Views/fonts/icon.css?v=0.11">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- data table style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
    <!-- Our CSS -->
	<link rel="stylesheet" type="text/css" href="Views/css/style.css">
</head>
<body>
<div class="containerr">
       <?php
        $enlace = new Enlaces();
        $enlace -> enlacesPanel();
       ?>

     </div>
    
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- data table.js -->
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
            <script type="text/javascript">
              $(document).ready(function() {
                $("#tablaProducto").DataTable();
                $("#tablaCategoria").DataTable();
              });
            </script>
</body>
</html>
<?php
ob_end_flush();
?>