<?php
class Producto{
    private $nombre;
    private $precio;

    public function __construct($nombre,$precio){
        $this->nombre = $nombre;
        $this->precio = $precio;

        $archivo = fopen("productos.txt", "a");
        fwrite($archivo, $nombre.":".$precio."\r\n");
        fclose($archivo);
    }

    public function __set($atr,$val){
        if(property_exists($this,$atr)){
            $this->$atr = $val;
        }
    }

    public function __get($atr){
        return $this->$atr;
    }
}
?>