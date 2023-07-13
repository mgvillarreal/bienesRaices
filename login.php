<?php
    /* AUTENTICAR EL USUARIO */
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ;
        $pwd =  mysqli_real_escape_string($db, $_POST['pwd']);

        if(!$email){
            $errores[] = 'El correo electrónico es obligatorio o no es válido';
        }

        if(!$pwd){
            $errores[] = 'La contraseña es obligatoria';
        }

        if(empty($errores)){
            //Validar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = mysqli_query($db, $query);

            if(!$resultado->num_rows){
                $errores[] = "El usuario no existe";
            }else{
                $usuario = mysqli_fetch_assoc($resultado);
                $auth = password_verify($pwd, $usuario['password']);
                
                if($auth){
                    session_start(); //Inicia la sesión
                    $_SESSION['usuario'] = $usuario['email']; //Llenar el arreglo de la sesión
                    $_SESSION['login'] = true;
                    header('Location: /admin');
                }
                else{
                    $errores[] = 'La contraseña es incorrecta';
                }
            }
        }
    }

    /* INCLUYE EL HEADER */
    require './includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" method="POST">
            <fieldset>
                <legend>Correo electrónico y Contraseña</legend>

                <label for="email">Email</label>
                <input type="email" placeholder="Correo electrónico" id="email" name="email">

                <label for="pwd">Contraseña</label>
                <input type="password" placeholder="Contraseña" id="pwd" name="pwd">

            </fieldset>

            <input type="submit" value="Iniciar sesión" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>