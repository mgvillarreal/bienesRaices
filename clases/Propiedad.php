<?php

namespace App;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedor'];
    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedor = $args['vendedor'] ?? '';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debe añadir un título";
        }
 
        if(!$this->precio){
            self::$errores[] = "El precio es obligatorio";
        }
 
        if(strlen($this->descripcion)<50){
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
 
        if(!$this->habitaciones){
            self::$errores[] = "La cantidad de habitaciones es obligatoria";
        }
 
        if(!$this->wc){
            self::$errores[] = "La cantidad de wc es obligatoria";
        }
 
        if(!$this->estacionamiento){
            self::$errores[] = "La cantidad de estacionamientos es obligatoria";
        }
 
        if(!$this->vendedor){
            self::$errores[] = "Debe añadir un vendedor";
        }
 
        if(!$this->imagen){
            self::$errores[] = "La imagen de la propiedad es obligatoria";
        }
 
        return self::$errores;
    }
}