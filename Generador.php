<?php 



class Generador{

	public function __construct()
	{
		require 'database/Conexion.php';
		$model = new Conexion;
		$this->conexion = $model->conectar();

	}

	/*
		Funcion que generar formalarios, se le pasa un array asociativo.		
		//PARAMETROS: guardar.cliente.php, POST, array( array('text','nombre'),array('text','apellido')).....,form-boostrap
	*/
	public function generar_formularios($nombre_formulario,$action,$method,$campos,$personalizados = null)
	{		
		echo '<form id="'.$nombre_formulario.'" action="'.$action.'" method="'.$method.'">';

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
	public function crear_sql_e_insert($formulario_entero,$tabla)
	{
		$insertColumns = array();
		$insertValues = array();
		
 	   	foreach ( $formulario_entero as $key => $value ) {

 	   		if ((int)$value) {
 	   			echo "Entero";
 	   		}else{ 
 	   			$value = "'".$value."'";
 	   		}
 	   		array_push($insertColumns, "`".$key."`");
 	   		array_push($insertValues, $value);
    	}

        $columnas = implode(",", $insertColumns);
        $valores = implode(",", $insertValues);
        
        $sql = "INSERT INTO $tabla ($columnas) VALUES ($valores)";
        $consulta = $this->conexion->prepare($sql);
        
        if (!$consulta) {
            $this->mensaje = "Error al crear registro";
        } else {
            $consulta->execute();
            $this->mensaje = "Registro creado correctamente";
            $this->ultimoId = $this->conexion->lastInsertId();
        }
	}
}


?>





















