<?php 



//importar la coenxion
require '../includes/config/database.php';
$db = conectarDB();
//Escribir  el Query
$query = "SELECT * FROM disenos";

// Consultar la BD
$resultadoConsulta = mysqli_query($db, $query);

//muestra mensaje condicional

$resultado = $_GET['resultado']?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $id = $_POST['id'];
   $id = filter_var($id, FILTER_VALIDATE_INT);

   if($id){
      //eliminar el archivo
      $query = "SELECT imagen FROM disenos WHERE id = '$id'";
      $resultado = mysqli_query($db, $query);
      $articulo = mysqli_fetch_assoc($resultado);

      unlink('../imagenes/'. $diseno['imagen']);
      //eliminar la propiedad
      $query = "DELETE FROM disenos WHERE id = '$id'";
      $resultado = mysqli_query($db, $query);

      if ($resultado){
         header('location:/catalogo?resultado=3');
      }

   }
}

   require '../includes/funciones.php';
   incluirFichero('headerAdmin');
?>

    <main class="contenedor seccion">
        <h1>CATÁLOGO</h1>
        <?php if( intval($resultado) === 1): ?>
         <p class="alerta exito"> Playera Preediseñada Agregada con Exito </p>
         <?php elseif( intval($resultado) === 2): ?>
          <p class="alerta exito"> Playera Preediseñada Actualizada Correctamente </p>
          <?php elseif( intval($resultado) === 3): ?>
          <p class="alerta exito"> Playera Preediseñada Eliminada Correctamente </p>
         <?php endif; ?>

        <a href="/catalogo/disenos/crear.php" class="boton boton-azul">Agregar nuevo diseño</a>
        <a href="/menu" class="boton boton-amarillo">Volver al menú </a>
   
        <table class="disenos">
         <thead>
            <tr>
               <th>ID</th>
               <th>Titulo</th>
               <th>Imagen</th>
               <th>Precio</th>
               <th>Acciones</th>
            </tr>
         </thead>

         <tbody> <!--Muestra los resultados -->
         <?php while($articulo = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
               <td> <?php echo $articulo['id'];?> </td>
               <td> <?php echo $articulo['titulo'];?></td>
               <td> <img src="/imagenes/<?php echo $articulo['imagen'];?>" class="imagen-tabla"> </td>
               <td>$<?php echo $articulo['precio'];?></td>
               <td>
                  <form method="POST" class="w-100">

                  <input type="hidden" name="id" value="<?php echo $articulo['id']; ?>">

                  <input type="submit" class="boton-rojo-block" value="Eliminar">
                  </form>
                  
                  <a href="catalogo/disenos/actualizar.php?id=<?php echo $articulo['id']; ?>" class="boton-amarillo-block"> Actualizar</a>
               </td>
            </tr>
            <?php endwhile; ?>
         </tbody>
        </table>
      </main>

    <?php 

    //cerrar la conexion
    mysqli_close($db);

      
    ?>