<?php 
require 'includes/funciones.php';
incluirFichero('header', $inicio = true);
?>


    <main class="contenedor seccion">
        

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Calidad</h3>
                <p>En Estampados Rey, la calidad es nuestra máxima prioridad. Utilizamos los mejores materiales y técnicas de impresión para garantizar que cada playera personalizada que creemos sea una obra de arte duradera. </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>En Estampados Rey, creemos en ofrecer productos de calidad a precios accesibles. Nos esforzamos por mantener nuestros precios competitivos sin comprometer la excelencia en el servicio o la calidad de nuestros productos.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Entendemos que el tiempo es valioso para nuestros clientes, por eso en Estampados Rey nos comprometemos a ofrecer un servicio eficiente y rápido.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Playeras prediseñadas</h2>

        <?php
        $limite = 3;// numero de anuncios de playera a mostrar en el index-- $limite proviene de ficheros/anuncios.php
        include 'includes/ficheros/anuncios.php';

        ?>
      

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-azul">Ver más diseños</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Contáctanos</h2>   
        <p>¿Listo para crear tus playeras personalizadas? ¡Contáctanos hoy y comienza a dar vida a tus diseños!






</p> 
        <a href="contacto.php" class="boton-amarillo">Contacto</a>
    
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestras promociones</h3>


            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="promociones.php">
                        <h4>Paquete de 4 playeras de cumpleaños</h4>
                        
                        <p>
                        ¡Celebra en grande con nuestra promoción especial para toda la familia! Obtén 4 playeras personalizadas con tu personaje favorito de cumpleaños. Desde los más pequeños hasta los más grandes, todos pueden lucir sus personajes preferidos y crear recuerdos inolvidables juntos. ¡Haz de tu celebración de cumpleaños un evento único con nuestras playeras personalizadas! 
                        </p>
                    </a>
                </div>
            </article>



           
        </section>


        <!-- <section class="testimoniales">
            <h3>Promo Especial Mayo </h3>
            <div class="testimonial">
                <blockquote>
                    Paquete de 6 playeras Adulto
                </blockquote>
                <p>$890</p>

            </div>
        </section> -->
    </div>
    <?php 
       incluirFichero('footer');
    ?>