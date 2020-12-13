<?php
$nombre = $_POST['nombre'];
$nombre_archivo= "productos.txt";

if(file_exists($nombre_archivo)){ 
    $producto_existe= file_get_contents($nombre_archivo);
    if(strpos($producto_existe,$nombre)!=false){
        $archivo = fopen("productos.txt", "r");
        while (($line = fgets($archivo)) != false) {
            list($nombre1, $precio) = explode(":", $line);
            if ($nombre == $nombre1) {
                $producto_existe = str_replace($line, "", $producto_existe);
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