<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "Nombre es mandatorio";
        }
 
        if(!$this->apellido){
            self::$errores[] = "Apellido es mandatorio";
        }
 
        if(!$this->telefono){
            self::$errores[] = "Teléfono es mandatorio";
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Teléfono inválido";
        }
 
        return self::$errores;
    }
}