
<?php 

require 'Generador.php';
$objeto = new Generador;

?>
<html>
<head>
	<title>Pag</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<h4>Generador de FORM</h4>	
		<div class="row">
			<div class="col-sm-6">
				<div class="jumbotron">
				    <?php 
				    	$objeto->generar_formularios('index.php','POST',
							array(
								['text','nombre'],
								['text','apellido'],
								['text','puesto'],
								['text','trabajo'],
								['text','ci'],
								['textarea','comentario'],
								['select','color',['Amarillo','Verde','Azul','Negro']],
							),
							'<div class="form-group">
				        		<div class="checkbox">
				          			<label><input type="checkbox"> Recuerda</label>
				        		</div>
				    		</div>'
							); 
					?>
			 	</div>	
			</div>
		    <div class="col-sm-6">
		    	<?php 
			    	$objeto->generar_formularios('index.php','POST',
						array(
							['text','tema'],
							['textarea','comentario'],
							['select','rubro',['TI','Ventas']],
						),
						'<div class="checkbox">
							<label><input type="checkbox" value="">Option 1</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="">Option 2</label>
						</div>'
						); 
					?>
		    </div>
		</div>	
	</div>
</body>
</html>