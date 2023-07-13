<?php

/* CONECTARSE A LA BD */
require './includes/config/database.php';
$db = conectarDB();

$email = 'admin@mail.com';
$pwd = "123456";
$pwdHash = password_hash($pwd, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$pwdHash')";

$resultado = mysqli_query($db, $query);

?>