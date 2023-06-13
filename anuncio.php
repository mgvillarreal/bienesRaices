<?php
    include './includes/templates/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al Bosque</h1>

        <div class="anuncio-contenedor">
            <picture>
                <source srcset="build/img/destacada.webp" type="image/webp">
                <source srcset="build/img/destacada.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada.jpg" alt="Anuncio Descripción">
            </picture>

            <div class="resumen-propiedad">
                <p class="precio">$3.000.000</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                        <p>4</p>
                    </li>
                </ul>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum distinctio ratione illum et, reiciendis harum sunt aperiam assumenda pariatur sed cumque odit itaque dolore, maiores aliquam nostrum a voluptates nisi. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit suscipit a rem obcaecati aperiam magnam, deserunt, quam in commodi corrupti incidunt fuga recusandae eos repellat, labore perferendis delectus excepturi maxime? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga quam illo beatae consectetur dolorum, amet non aperiam architecto mollitia sequi eaque nulla a quaerat cum ex explicabo? Incidunt, eligendi nulla. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea quos, voluptatibus cupiditate delectus, assumenda officia saepe dolores, pariatur quibusdam aut quod voluptas odit voluptatem impedit ab quidem aperiam eaque consequatur! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio molestias, atque pariatur voluptate repellat sapiente nihil ipsa. Quis suscipit odit aut sed perspiciatis maxime soluta, natus alias quos hic esse.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo facilis perferendis numquam fugiat quos adipisci. Quia numquam dolores corrupti repellendus, consequatur rem, soluta quisquam expedita nam eaque officiis porro perspiciatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, perspiciatis quam. Incidunt reprehenderit a officiis laboriosam sunt, tempore officia unde accusantium molestias voluptatibus! Dignissimos nulla ducimus itaque. Ex, consequuntur! Tenetur.
                </p>
            </div>
        </div>
    </main>

<?php
    include './includes/templates/footer.php';
?>