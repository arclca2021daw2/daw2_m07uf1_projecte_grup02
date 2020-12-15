<?php
$user = $_POST['usuario'];
$nombre_archivo= "usuarios.txt";
if(file_exists($nombre_archivo)){ 
    $producto_existe= file_get_contents($nombre_archivo);
    $archivo = fopen($nombre_archivo, "r");
    while (($line = fgets($archivo)) != false) {
        list($usuario, $contrasena, $nombre, $direccion, $telefono, $visa)= explode(":", $line);
        if ($user == $usuario) {
            $producto_existe = str_replace($line, "", $producto_existe);
            file_put_contents($nombre_archivo, $producto_existe);
        }
    }
    fclose($archivo);
    header("refresh: 0; url=usuarios_admin.php");
}
?>