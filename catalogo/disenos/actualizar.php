<?php 

//Validar la URL por ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
   header('Location: /catalogo');
}

//base de datos

require '../../includes/config/database.php';
$db = conectarDB();

//Obtener los datos de la propiedad
$consulta = "SELECT * FROM disenos WHERE id = '$id'";
$resultado = mysqli_query($db, $consulta);
$articulo = mysqli_fetch_assoc($resultado);

//Consultar para obtener los disenadores
$consulta = "SELECT * FROM disenadores";
$resultado = mysqli_query($db, $consulta);

//Arreglo con mensajes de errores

$errores =[];

  $titulo = $articulo['titulo'];
  $precio =  $articulo['precio'];
  $descripcion =  $articulo['descripcion'];
  $nFrente =  $articulo['nFrente'];
  $nEspalda =  $articulo['nEspalda'];
  $nMangas =  $articulo['nMangas'];
  $disenadores_id =  $articulo['disenadores_id'];
  $imagenPropiedad = $articulo['imagen'];

// ejecutar el codigo despues de que el usuario envia el formulario

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  //exit;

    //echo "<pre>";
  //var_dump($_FILES);
  //echo "</pre>";



  $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ;
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $nFrente = mysqli_real_escape_string($db, $_POST['nFrente']);
  $nEspalda = mysqli_real_escape_string($db, $_POST['nEspalda']);
  $nMangas = mysqli_real_escape_string($db, $_POST['nMangas']);
  $disenadores_id = mysqli_real_escape_string($db, $_POST['disenadores_id']);
  $creado = date('Y/m/d');
// SECCION PARA VALIDAR DATOS DEL FORMULARIO
  $imagen = $_FILES['imagen'];

  

  if(!$titulo){
    $errores[]= "Debes añadir un titulo";
  }
  if(!$precio){
    $errores[]= "El precios es obligatorio";
  }
  if(!$descripcion){
    $errores[]= "La descripcion es obligatoria";
  }
  if ($nFrente === '') {
    $errores[] = "El número de estampados en frente es obligatorio";
}  else if ($nFrente === '0') {
    $nFrente = 0;  
}elseif (!is_numeric($nFrente)) {
    $errores[] = "El número de estampados en frente debe ser un valor numérico válido";
} else {
    $nFrente = (int)$nFrente;
    if ($nFrente < 0) {
        $errores[] = "El número de estampados en frente no puede ser negativo";
    }
}

 

  if ($nEspalda === '') {
    $errores[] = "El número de estampados en la espalda es obligatorio";
}  else if ($nEspalda === '0') {
    $nEspalda = 0;  
}elseif (!is_numeric($nEspalda)) {
    $errores[] = "El número de estampados en la espalda debe ser un valor numérico válido";
} else {
    $nEspalda = (int)$nEspalda;
    if ($nEspalda < 0) {
        $errores[] = "El número de estampados en la espalda no puede ser negativo";
    }
}


  if ($nMangas === '') {
    $errores[] = "El número de estampados en la manga es obligatorio";
}  else if ($nMangas === '0') {
    $nMangas = 0;  
}elseif (!is_numeric($nMangas)) {
    $errores[] = "El número de estampados en las mangas debe ser un valor numérico válido";
} else {
    $nMangas = (int)$nMangas;
    if ($nMangas < 0) {
        $errores[] = "El número de estampados en las mangas no puede ser negativo";
    }
}
  if(!$disenadores_id){
    $errores[]= "elige un disenador";
  }
  //if(!$imagen['name']){       borrar con el tiempo es para solicitar imagen obligatoria
   // $errores[] = 'La imagen es obligatoria';borrar con el tiempo es para solicitar imagen obligatoria
  //}borrar con el tiempo es para solicitar imagen obligatoria

  //Validar imagenes por tamaño (1mb)
  $medida = 1000 * 1000;
  if($imagen['size']>$medida){
    $errores[]='La imagen es muy pesada';
  }

  //echo "<pre>";
  //var_dump($errores);
  //echo "</pre>";
  //exit; // SI LOS DATOS AGREGADOS NO SON INSERTADOS POR USUARIO NO SE ALMACENAN DATOS EN BD

//Revisar que el array este vacio
if(empty($errores)){
  //Crear carpeta 
  $carpetaImagenes = '../../imagenes/';
  if(!is_dir($carpetaImagenes)){
    mkdir($carpetaImagenes);
  }

  $nombreImagen = '';

  /* SUBIDA DE ARCHIVOS  */
 if($imagen['name']){
 // Eliminar imagen previa
 unlink($carpetaImagenes . $articulo['imagen']);

  //Generar nombre unico para las iamganes almacenadas
  $nombreImagen = md5( uniqid( rand(),true)) . ".jpg";

  //subir la imagen
  move_uploaded_file ($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
 }else {
  $nombreImagen =$articulo['imagen'];
 }

  
 

  
  

  $query = " UPDATE disenos SET titulo = '$titulo', precio = '$precio',imagen = '$nombreImagen', descripcion ='$descripcion', nFrente = '$nFrente',
  nEspalda = '$nEspalda', nMangas = '$nMangas', disenadores_id = '$disenadores_id' WHERE id = '$id'";

  //echo $query; sirve para probar impresion en pantalla
  

  $resultado = mysqli_query($db, $query);
  if($resultado){
    //Redireccionar al usuario una vez enviado el formulario
    header('Location: /catalogo?resultado=2');
  }
}



}


require '../../includes/funciones.php';
   incluirFichero('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar</h1>

        <a href="/catalogo" class="boton boton-azul">Volver</a>

        <?php foreach($errores as $error):?>
          <div class="alerta error">
          <?php echo $error;?>
          </div>
          
          <?php endforeach;?>

        <form class="formulario" method="POST"  enctype="multipart/form-data">
          <fieldset>
            <legend> Información general</legend>

            <label for="titulo"> Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>">

            <label for="precio"> Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="precio" value="<?php echo $precio; ?>">

            <label for="imagen"> Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small" >

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
          </fieldset>

            <fieldset>
              <legend>Especificaciones</legend>

            <label for="nFrente"> Número de estampados enfrente:</label>
            <input type="number" id="nFrente" name="nFrente" placeholder="ejemplo 3"  value="<?php echo $nFrente; ?>" >

            <label for="nEspalda"> Número de estampados en la Espalda:</label>
            <input type="number" id="nEspalda" name="nEspalda" placeholder="ejemplo 3" value="<?php echo $nEspalda; ?>">

            <label for="nMangas"> Número de estampados en las mangas:</label>
            <input type="number" id="nMangas" name="nMangas" placeholder="ejemplo 3"  value="<?php echo $nMangas; ?>">
            </fieldset>
            
            <fieldset>
              <legend>Diseñador</legend>

              <select name="disenadores_id">
                <option value="">--Seleccione--</option>
                <?php while($disenador = mysqli_fetch_assoc($resultado)): ?>
                  <option <?php echo $disenadores_id === $disenador['id'] ?'selected' :'';?> value="<?php echo $disenador['id']; ?>">
                  <?php echo $disenador['nombre']. " " . $disenador['apellido'];?> </option>
                  <?php endwhile; ?>
              </select>
            </fieldset>
          
            <input type="submit" value="Actualizar Artículo" class="boton boton-azul">
        </form>
         
        
            
    </main> 

    <?php 
       incluirFichero('footer');

    ?>


