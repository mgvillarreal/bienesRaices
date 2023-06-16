<?php
    require './includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
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
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Construye una Piscina en tu Hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>07/05/2023</span> Por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores para darle vida s tu espacio.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="Texto entrada Blog">
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

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Guía para la Decoración de tu Habitación</h4>
                    <p class="informacion-meta">Escrito el: <span>12/04/2023</span> Por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores para darle vida s tu espacio.
                    </p>
                </a>
            </div>
        </article>
    </main>

<?php
    incluirTemplate('footer');
?>