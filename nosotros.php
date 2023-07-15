<?php
    require './includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <section class="nosotros-contenido">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <h4>25 Años de Experiencia</h4>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt quia est repellat iste eius delectus fugiat reiciendis temporibus consequuntur mollitia ex quaerat, saepe adipisci hic, ut, dolorum cupiditate. Maiores, nemo. Lorem ipsum dolor sit amet consectetur adipisicing elit. A deleniti perferendis neque optio, perspiciatis est distinctio accusamus itaque temporibus, voluptates placeat quisquam repellendus molestias libero reiciendis possimus quam omnis magni.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam incidunt maxime autem perferendis sint delectus, illum sequi perspiciatis molestiae esse quos, est excepturi harum doloremque. Laboriosam alias illum facere adipisci?</p>
            </div>
        </section>
    </main>

    <section class="contenedor seccion">
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
    </section>

<?php
    incluirTemplate('footer');
?>