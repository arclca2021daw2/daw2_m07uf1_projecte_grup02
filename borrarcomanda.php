<?php
$id = $_POST['id'];
$user = $_POST['user'];
$nombre_archivo= "carrito/".$user.".txt";
if(file_exists($nombre_archivo)){ 
    $producto_existe= file_get_contents($nombre_archivo);
    $archivo = fopen($nombre_archivo, "r");
    while (($line = fgets($archivo)) != false) {
        list($idpedido, $nombre, $cantidad, $precio) = explode("|", $line);
        if ($id == $idpedido) {
            $producto_existe = str_replace($line, "", $producto_existe);
            file_put_contents($nombre_archivo, $producto_existe);
        }
    }
    fclose($archivo);
    header("refresh: 0; url=comandas_admin.php");
}
?>