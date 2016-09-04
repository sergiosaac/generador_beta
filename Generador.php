<?php



class Generador
{

    /*
    Funcion que generar formalarios, se le pasa un array asociativo.
    //PARAMETROS: guardar.cliente.php, POST, array( array('text','nombre'),array('text','apellido')).....,form-boostrap
    */
    public function generar_formularios($nombre_formulario, $action, $method, $campos, $personalizados = null)
    {
        echo '<form id="' . $nombre_formulario . '" action="' . $action . '" method="' . $method . '">';

        for ($i = 0; $i < count($campos); $i++) {
            if ($campos[$i][0] == 'select') {

                echo '<div class="form-group">';
                echo '<label for="' . $campos[$i][1] . '">' . ucwords($campos[$i][1]) . ':</label>';
                echo '<select class="form-control" id="' . $campos[$i][1] . '" name="' . $campos[$i][1] . '" required>';
                for ($j = 0; $j < count($campos[$i][2]); $j++) {
                    echo '<option value="' . $campos[$i][2][$j] . '">' . $campos[$i][2][$j] . '</option>';
                }
                echo '</select>';
                echo '</div>';

            } elseif ($campos[$i][0] == 'text') {

                echo '<div class="form-group">';
                echo '<label for="' . $campos[$i][1] . '">' . ucwords($campos[$i][1]) . ':</label>';
                echo '<input type="' . $campos[$i][0] . '" name="' . $campos[$i][1] . '" class="form-control" id="' . $campos[$i][1] . '" required>';
                echo "</div>";

            } elseif ($campos[$i][0] == 'textarea') {
                echo '<div class="form-group">';
                echo '  <label for="' . $campos[$i][1] . '">' . ucwords($campos[$i][1]) . ':</label>';
                echo '  <textarea class="form-control" rows="5" name="' . $campos[$i][1] . '" id="' . $campos[$i][1] . '" required></textarea>';
                echo '</div>';
            }

            if ($campos[$i][0] != 'textarea' && $campos[$i][0] != 'text' && $campos[$i][0] != 'select') {
              echo '<div class="form-group">';
              echo '  <label for="' . $campos[$i][1] . '">' . ucwords($campos[$i][1]) . ':</label>';
              echo '<input type="' . $campos[$i][0] . '" name="' . $campos[$i][1] . '" class="form-control" id="' . $campos[$i][1] . '" required>';
              echo '</div>';
            }
        }

        echo $personalizados;
        echo '<button type="submit" class="btn btn-default">Enviar</button>';
        echo "</form>";
    }


    /*
    Generar tabla de control de informacion
    */

    public function generar_tabla_de_control($data)
    {
        echo '<h3>Lista de elmentos</h3><hr><table class="table"><thead><tr>';

				for ($i=0; $i < count($data[0]); $i++) {
					echo '<th>'.$data[0][$i].'</th>';
				}

				echo '<th colspan="2">Editar</th>';
        echo "</tr></thead><tbody>";

				for ($i=0; $i < count($data[1]); $i++) {
					echo "<tr>";
						for ($j=0; $j < (count($data[1][$i])/2)-2; $j++) {
							echo "<td>" . $data[1][$i][$j] . "</td>";
						}
						echo '<td><button data-id="' . $data[1][$i][0] . '" type="button" class="editar btn btn-primary btn-xs">Editar</button></td>';
						echo '<td><button data-id="' . $data[1][$i][0] . '" type="button" class="eliminar btn btn-danger btn-xs">Eliminar</button></td>';
					echo "</tr>";
				}
        echo "</tbody></table>";
    }


    /*
    Funcion para crear insert automatico en mysql
    */
    public function generar_sql_e_insert($formulario_entero, $tabla, $valores_procesados = null)
    {
			require 'database/Conexion.php';
			$model          = new Conexion;
			$conexion = $model->conectar();

        $insertColumns = array();
        $insertValues  = array();

        foreach ($formulario_entero as $key => $value) {

            if (strpos($value,'-')) {
              $value = "'" . $value . "'";
            } elseif((int) $value) {
              echo "Entero";
            }else{
              $value = "'" . $value . "'";
            }
            array_push($insertColumns, "`" . $key . "`");
            array_push($insertValues, $value);
        }

        $columnas = implode(",", $insertColumns);
        $valores  = implode(",", $insertValues);

        $sql      = "INSERT INTO $tabla ($columnas) VALUES ($valores)";
        $consulta = $conexion->prepare($sql);

        if (!$consulta) {
            $this->mensaje = "Error al crear registro";
        } else {
            $consulta->execute();
            $this->mensaje  = "Registro creado correctamente";
            $this->ultimoId = $conexion->lastInsertId();
        }
    }



    /*
    Funcion para hacer update

    */
}


?>
