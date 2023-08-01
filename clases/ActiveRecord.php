<?php

namespace App;

class ActiveRecord{
    /* Base de Datos */
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    /* Errores */
    protected static $errores = [];
 
    public static function setDB($database){
        self::$db = $database;
    }
 
    public function crear(){
        $atributos = $this->sanitizarAtributos();
 
        $query  = "INSERT INTO " . static::$tabla . " (";
        $query .=  join(', ', array_keys($atributos));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "')";
        $resultado = self::$db->query($query);
 
        if($resultado){
            header('Location: /admin?resultado=1');
        }
    }
 
    public function actualizar(){
        $atributos = $this->sanitizarAtributos();
 
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "$key='$value'";
        }
 
        $query  = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ',$valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "'";
        $query .= " LIMIT 1";
 
        $resultado = self::$db->query($query);
         
        if($resultado){
            header('Location: /admin?resultado=2'); //Redireccionar el usuario
        }
    }
 
    public function guardar(){
        if(!is_null($this->id)){
            $this->actualizar();
        }
        else{
            $this->crear();
        }
    }
 
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = '" . self::$db->escape_string($this->id) . "' LIMIT 1";
        $resultado = self::$db->query($query);
 
        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }
 
    public function atributos(){
        $atributos = [];
 
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
 
    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
 
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function setImagen($imagen){
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
 
        if($imagen){
            $this->imagen = $imagen;
        }
    }
 
    public function borrarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
 
    public static function getErrores(){
        return self::$errores;
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
            self::$errores[] = "La imagen es obligatoria";
        }
 
        return self::$errores;
    }
 
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
 
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
 
    public static function consultarSQL($query){
        $resultado = self::$db->query($query);
 
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }
 
        $resultado->free();
 
        return $array;
    }
 
    protected static function crearObjeto($registro){
        $objeto = new static;
 
        foreach($registro as $key => $value){
            if( property_exists($objeto, $key) ){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
 
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}