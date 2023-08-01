<?php

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    autenticar();

    // Validar la URL por un ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /admin');
    }

    $propiedad = Propiedad::find($id); //Consultar datos de la propiedad

    //Consultar para obtener vendedores
    // $consulta = "SELECT * FROM vendedores";
    // $resultado = mysqli_query($db, $consulta);

    $errores = Propiedad::getErrores(); // Arreglo con mensajes de errores

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $args = $_POST['propiedad']; //asignar los atributos

        $propiedad->sincronizar($args);

        $errores = $propiedad->validar();

        /* Subida de Archivos */
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg"; //Generar nombre único

        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600); //Realizar resize a la imagen con intervention
            $propiedad->setImagen($nombreImagen); //Setear el nombre de la imagen generado para la BD
        }
        
        if(empty($errores)){
            $image->save(CARPETA_IMAGENES . $nombreImagen); //Almacenar imagen

            $propiedad->guardar();
        }

    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" method="POST" enctype="multipart/form-data"> 
            
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>