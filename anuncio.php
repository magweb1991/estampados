<?php 

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('location:/');
}


//importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//COonsultar
$query = "SELECT * FROM disenos WHERE id = $id";

// Obtener resultado
$resultado = mysqli_query($db, $query);

if(!$resultado->num_rows){
    header('location:/');
}
$articulo = mysqli_fetch_assoc($resultado);


   require 'includes/funciones.php';
   incluirFichero('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $articulo['titulo']; ?></h1>
        
            <img loading="lazy" src="/imagenes/<?php echo $articulo['imagen']; ?>" alt="imagen de la propiedad">
       
        
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $articulo['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_espalda.svg" alt="icono nEspalda">
                    <p><?php echo $articulo['nEspalda']; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_manga.svg" alt="icono nMangas">
                    <p><?php echo $articulo['nMangas']; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_pfrente.svg" alt="icono dormitorio">
                    <p><?php echo $articulo['nFrente']; ?></p>
                </li>
            
            </ul>
            <?php echo $articulo['descripcion']; ?>
            <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-azul">Ver más diseños</a>
        </div>
        </div>

    </main>

    <?php 
    mysqli_close($db);
       incluirFichero('footer');
    ?>