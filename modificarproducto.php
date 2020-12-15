<?php
$nombre = $_POST['nombre'];
$nuevoprecio = $_POST['precio'];
$nombre_archivo= "productos.txt";

if(file_exists($nombre_archivo)){ 
    $producto_existe= file_get_contents($nombre_archivo);
    if(strpos($producto_existe,$nombre)!=false){
        $archivo = fopen("productos.txt", "r");
        while (($line = fgets($archivo)) != false) {
            list($nombre1, $precio) = explode(":", $line);
            if ($nombre == $nombre1) {
                $nuevalinea = $nombre.":".$nuevoprecio."\r\n";
                $producto_existe = str_replace($line, $nuevalinea, $producto_existe);
                file_put_contents($nombre_archivo, $producto_existe);
            }
        }
        fclose($archivo);
        header("refresh: 0; url=ok_admin.php");
    } else {
        echo "El producto no existe.";
    }  
}
?>