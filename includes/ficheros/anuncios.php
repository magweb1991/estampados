<?php
//importar la conexion
require __DIR__ . '/../config/database.php';
$db = conectarDB();

//COonsultar
$query = "SELECT * FROM disenos LIMIT $limite";


// Obtener resultado
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while($articulo = mysqli_fetch_assoc($resultado)): ?>
            
            <div class="anuncio">
               
                    <img loading="lazy" src="/imagenes/<?php echo $articulo['imagen']; ?>" alt="anuncio">
              

                <div class="contenido-anuncio">
                    <h3><?php echo $articulo['titulo']; ?></h3>
                    <p><?php echo $articulo['descripcion']; ?></p>
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

                    <a href="anuncio.php?id=<?php echo $articulo['id']; ?> " class="boton-amarillo-block">Ver más sobre este árticulo </a>
                </div> <!--contenido anuncio-->
            
            </div><!-- anuncio-->

         <?php endwhile; ?>

        </div><!--contenedor-anuncios-->

        <?php
        //cerrar la conexion
        mysqli_close($db);

        ?>