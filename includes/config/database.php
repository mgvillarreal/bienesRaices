<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '1902', 'bienesraices_crud');

    if(!$db){
        echo "Error. No se conectó";
        exit;
    }
    
    return $db;
}