<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '1902', 'bienesraices_crud');

    if(!$db){
        echo "Error. No se conectó";
        exit;
    }
    
    return $db;
}