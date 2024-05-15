<?php

require 'app.php';
function incluirFichero($nombre, $inicio = false){
    include FICHEROS_URL ."/$nombre.php";
}

