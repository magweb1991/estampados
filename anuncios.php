<?php 
   require 'includes/funciones.php';
   incluirFichero('header');
?>

    <main class="contenedor seccion">
        
    <h2>Playeras Prediseñadas para tu evento especial</h2>

    <?php
        $limite = 18;// numero de anuncios de playera a mostrar en el index-- $limite proviene de ficheros/anuncios.php
        include 'includes/ficheros/anuncios.php';
        ?>
    
    </main>

    <?php 
       incluirFichero('footer');
    ?>