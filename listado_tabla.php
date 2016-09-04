
<?php
  // put your code here


/*
Esta es la tabla a la cual se hace CRUD

TABLA = noticias

Columna	Tipo	Comentario

//id	int(10) unsigned Incremento automático

titulo	varchar(255)
videosNovedad	varchar(255)
contenido	longtext
imagen	varchar(255)
fecha	date

//created_at	timestamp [0000-00-00 00:00:00]
//updated_at	timestamp [0000-00-00 00:00:00]
*/


require 'database/CRUD.php';
if (!class_exists('Conexion')) {
  require 'database/Conexion.php';
  if (!class_exists('Generador')) {
    require 'Generador.php';
    $objeto = new Generador;
  }
}

$model = new CRUD;
$model->select = '*';
$model->from = 'noticias';
$model->orderBy = 'ORDER BY id DESC';
$model->Read();
$filas = $model->rows;

$tabla = [['id','titulo','videosNovedad','contenido','imagen','fecha'],$filas];

$objeto->generar_tabla_de_control($tabla);

?>
