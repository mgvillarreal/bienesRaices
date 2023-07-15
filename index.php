<?php
    require './includes/app.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia expedita pariatur, provident, blanditiis corrupti, quia dolorum doloremque nobis quos iusto sed eveniet consequuntur earum eius eligendi labore laudantium obcaecati qui!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia expedita pariatur, provident, blanditiis corrupti, quia dolorum doloremque nobis quos iusto sed eveniet consequuntur earum eius eligendi labore laudantium obcaecati qui!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia expedita pariatur, provident, blanditiis corrupti, quia dolorum doloremque nobis quos iusto sed eveniet consequuntur earum eius eligendi labore laudantium obcaecati qui!</p>
            </div>
        </div> <!--iconos-nosotros-->
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

        <?php
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>

        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>

        <a href="contacto.php" class="boton-amarillo-inlineblock">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el Techo de tu Casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/05/2023</span> Por: <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Texto entrada Blog">
                    </picture>
                </div>
                
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guía para la Decoración de tu Hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>26/04/2023</span> Por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores para darle vida s tu espacio.
                        </p>
                    </a>
                </div>
                
            </article>
        </section> <!--blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Isabel Gómez</p>
            </div>
        </section>
    </div>

<?php
    incluirTemplate('footer');
?>