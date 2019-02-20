<?php 
 require 'vendor/autoload.php'; // include Composer's autoloader

 //Conectar al servidor
 $connection = new MongoDB\Client("mongodb://localhost:27017");
 //Conectar a la base de datos
 $db = $connection->padilla_martinez;
 //Acceder a la collection
 $library_collection = $db->biblioteca;

$result = $library_collection->find( [ 'autores' => 'Stephen King'] );


echo "Valores encontrados: \n";
foreach ($result as $entry) {
  echo $entry['nombre_libro'], ': ', $entry['anio_edicion'], "\n";
}

?>