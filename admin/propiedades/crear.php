<?php
    /* MANEJO DE SESIONES */
    require '../../includes/funciones.php';
    $auth = autenticar();

    if(!$auth){
        header('Location: /');
    }

    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar para obtener vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedor = '';

    // Se ejecuta después de que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedor = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debe añadir un título";
        }

        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }

        if(strlen($descripcion)<50){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "La cantidad de habitaciones es obligatoria";
        }

        if(!$wc){
            $errores[] = "La cantidad de wc es obligatoria";
        }

        if(!$estacionamiento){
            $errores[] = "La cantidad de estacionamientos es obligatoria";
        }

        if(!$vendedor){
            $errores[] = "Debes añadir un vendedor";
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[] = "La imagen es obligatoria";
        }

        //Validar por tamaño (1MB máximo)
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }
        
        if(empty($errores)){
            // Subida de Archivos

            //Crear una carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //Generar nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            //Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion','$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedor')";
        
            $resultado = mysqli_query($db, $query);

            if($resultado){
                //Redireccionar el usuario
                header('Location: /admin?resultado=1');
            }
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
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend for="vendedor">Vendedor</legend>
                <select id="vendedor" name="vendedor">
                    <option value="" selected>Seleccione vendedor</option>
                    <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>
                        <option <?php echo $vendedor === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id'] ?>"> <?php echo $row['nombre'] . " " . $row['apellido'] ?> </option>
                    <?php endwhile ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>