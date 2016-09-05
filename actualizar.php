<?php

require 'Generador.php';
$objeto = new Generador;

?>
<html>
<head>
	<title>Rapido - Sergio Amarilla</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h3>Generador de FORM - CRUD - AJAX</h3>
		<p>Componente para crear sistema CRUD - AJAX rapido, solo creando array con los campos que se necestaran. Version BETA.</p>
		<a href="index.php">Listado</a> -> <a href="#">Actualizar</a>
		<hr>
		<div class="row">
			<div class="col-md-8">
				<div class="jumbotron">
					<h4>Ingresa los datos para actualizar:</h4>
					<hr>
				<?php
					$objeto->generar_formularios('formulario2','#','POST',
					array(
						['text','titulo'],
						['text','videosNovedad'],
						['text','contenido'],
						['text','imagen'],
						['date','fecha'],
					)
					);
				?>
				</div>
			</div>
      <div class="col-md-4">
        <p>
          Panel para actualizar registro.
        </p>
      </div>
		</div>
	</div>
</body>
</html>
