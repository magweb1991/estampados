<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '','estampados_r');

   if(!$db){
    echo "Error no se pudo conectar";
    exit;
   }
   return $db;
}




/*codigo para  probar si se conecta la base de datos, se uso para probar nadamas
function conectarDB(){
    $db = mysqli_connect('localhost','root', '', 'estampados_r');

    if($db){
        echo "se conecto";
    } else{
        echo "no se conecto";
    }
}
*/