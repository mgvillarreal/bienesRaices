<?php

require 'app.php';

function incluirTemplate($nombre){
    // include './includes/templates/'.$nombre.'.php';
    include TEMPLATES_URL.'/'.$nombre.'.php';
}