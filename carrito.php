<?php
session_start();
if(isset($_SESSION['identificador'])){
    $identificador = $_SESSION['identificador'];
    $user = $_SESSION['user'];

    if ($identificador == TRUE){

    $cantidad = $_POST['cant'];
    $precio= $_REQUEST['Precio'];
    $Nombre_Producto= $_REQUEST['Nombre_Producto'];
    $precio_total= $precio*$cantidad;

        
    }else{
        echo "<script>location.href = 'ok_login.php'</script>";
    }
}

$nombre_archivo = "./carrito/$user.txt";
$archivo = fopen($nombre_archivo, "r");
$linies = 0;
while(($line = fgets($archivo)) != false){
    $linies++;
}
fclose($archivo);
$archivo1 = fopen($nombre_archivo, "a");
$mensaje = ++$linies."|".$Nombre_Producto."|".$cantidad."|".$precio_total;
fwrite($archivo1, $mensaje."\r\n");
fclose($archivo1);
header("location: ok_login.php");
?>