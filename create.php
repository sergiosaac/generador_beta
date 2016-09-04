<?php 

require 'Generador.php';
$objeto = new Generador;
$objeto->crear_sql_e_insert($_POST,'noticias');


?>