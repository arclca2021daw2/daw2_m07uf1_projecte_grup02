<?php
session_start();
if(isset($_SESSION['identificador'])){
   $identificador = $_SESSION['identificador'];
   $user = $_SESSION['user'];
}
$idcomanda = $_POST['id'];
$nuevacantidad = $_POST['cantidad'];
$nombre_archivo= "./carrito/$user.txt";

$archivocompleto= file_get_contents($nombre_archivo);
$archivo = fopen($nombre_archivo, "r");
while (($line = fgets($archivo)) != false) {
    list($id, $producto, $cantidad, $precio)= explode("|", $line);
    if ($idcomanda == $id) {
        $preciounidad = (int)$precio / (int)$cantidad;
        $nuevoprecio = $preciounidad * (int)$nuevacantidad;
        $nuevalinea = $id."|".$producto."|".$nuevacantidad."|".$nuevoprecio."\n";
        $archivocompleto = str_replace($line, $nuevalinea, $archivocompleto);
        file_put_contents($nombre_archivo, $archivocompleto);
    }
}
fclose($archivo);
header("refresh: 0; url=carrito_completo.php");
?>