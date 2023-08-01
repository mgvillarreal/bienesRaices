<?php
    /* MANEJO DE SESIONES */
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;
   
    autenticar();

    $db = conectarDB();

    $propiedad = new Propiedad;

    //Consultar para obtener vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = Propiedad::getErrores(); //Arreglo con mensajes de errores

    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //Se ejecuta después de que el usuario envía el formulario
        $propiedad = new Propiedad($_POST['propiedad']);

        /* Subida de Archivos */
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg"; //Generar nombre único

        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600); //Realizar resize a la imagen con intervention
            $propiedad->setImagen($nombreImagen); //Setear el nombre de la imagen generado para la BD
        }
        
        $errores = $propiedad->validar();

        if(empty($errores)){
            if(!is_dir(CARPETA_IMAGENES)){ //Crear una carpeta
                mkdir(CARPETA_IMAGENES);
            }
            
            $image->save(CARPETA_IMAGENES . $nombreImagen); //Guarda la imagen en el servidor

            $propiedad->guardar(); //Guarda en la base de datos
        }

    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data"> 
            
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>