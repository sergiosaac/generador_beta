<?php 

class Generador{

	/*
		Funcion que generar formalarios, se le pasa un array asociativo.		
		//PARAMETROS: guardar.cliente.php, POST, array( array('text','nombre'),array('text','apellido')).....,form-boostrap
	*/

	public function generar_formularios($action,$method,$campos,$personalizados = null)
	{		
		echo '<form action="'.$action.'" method="'.$method.'">';

		for ($i=0; $i < count($campos); $i++) {
			if ($campos[$i][0] == 'select') {
			
				echo '<div class="form-group">';	
					echo '<label for="'.$campos[$i][1].'">'.ucwords($campos[$i][1]).':</label>';  
					echo '<select class="form-control" id="'.$campos[$i][1].'" name="'.$campos[$i][1].'">';  
						for ($j=0; $j < count($campos[$i][2]); $j++) { 
						    echo '<option value="'.$campos[$i][2][$j].'">'.$campos[$i][2][$j].'</option>';
						}    
					echo '</select>';  
				echo '</div>';
			
			}elseif ($campos[$i][0] == 'text'){

				echo '<div class="form-group">';
				echo '<label for="'.$campos[$i][1].'">'.ucwords($campos[$i][1]).':</label>';
				echo '<input type="'.$campos[$i][0].'" name="'.$campos[$i][1].'" class="form-control" id="'.$campos[$i][1].'">';	
				echo "</div>";

			} elseif ($campos[$i][0] == 'textarea') {
				echo '<div class="form-group">';
				echo '  <label for="'.$campos[$i][1].'">'.ucwords($campos[$i][1]).':</label>';
				echo '  <textarea class="form-control" rows="5" name="'.$campos[$i][1].'" id="'.$campos[$i][1].'"></textarea>';
				echo '</div>';
			}
		}
		
		echo $personalizados;
		echo '<button type="submit" class="btn btn-default">Enviar</button>';
		echo "</form>";
	}

	/*
		Funcion para crear insert automatico en mysql
	*/
	public function crear_sql_insert()
	{
		# code...
	}
}


?>