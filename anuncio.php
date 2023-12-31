<?php
    use App\Propiedad;

    require './includes/app.php';

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /');
    }

    $propiedad = Propiedad::find($id);
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

        <div class="anuncio-contenedor">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio Descripción">
            </picture>

            <div class="resumen-propiedad">
                <p class="precio">$<?php echo number_format($propiedad->precio, 2, ",", "."); ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>

                <p>
                    <?php echo $propiedad->descripcion; ?>
                </p>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>