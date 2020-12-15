<?php
session_start();
if(isset($_SESSION['identificador'])){
   $identificador = $_SESSION['identificador'];
   $user = $_SESSION['user'];
}
$contrasena = $_POST['password'];
$nombre = $_POST['nombre'];
$direccion =$_POST['direccion'];
$telefono = $_POST['telefono'];
$visa = $_POST['visa'];
$nombre_archivo= "usuarios.txt";

$archivocompleto= file_get_contents($nombre_archivo);
$archivo = fopen($nombre_archivo, "r");
while (($line = fgets($archivo)) != false) {
    list($usuario, $passwd, $nom, $dir, $tlf, $visaantigua)= explode(":", $line);
    if ($usuario == $user) {
        $nuevalinea = $user.":".$contrasena.":".$nombre.":".$direccion.":".$telefono.":".$visa."\r\n";
        $archivocompleto = str_replace($line, $nuevalinea, $archivocompleto);
        file_put_contents($nombre_archivo, $archivocompleto);
    }
}
fclose($archivo);
header("refresh: 0; url=datos_usuario.php");
?>