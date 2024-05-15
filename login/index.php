<?php 

   require '../includes/funciones.php';
   incluirFichero('headerAdmin');
?>

   

      <h1 class="nombre-pagina">LOGIN </h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>




<form class="formulario" method="POST" action="/catalogo/disenos/crear.php" enctype="multipart/form-data">
    <div class="campo">
        <label for="email"> Email</label>
        <input
        type="email"
        id= "email"
        placeholder="Tu email"
        name="email"
        />
    </div>


    <div class="campo">
        <label for="password"> Contraseña</label>
        <input
        type="password"
        id= "password"
        placeholder="Contraseña"
        name="password"
        />
    </div>

    <!-- <input type="submit" class="boton-azul" value="Iniciar Sesión"> -->
    <a href="/menu" class="boton-azul">Iniciar Sesión</a>
</form>

<div class="">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una </a>
    <a href="/olvide">¿Olvidaste tu contraseña? </a>
</div>

           


