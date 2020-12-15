<?php
$user = $_POST['user'];
$password = $_POST['password'];
$nombre_archivo = "usuarios.txt";

$correcto = false;
$archivocompleto= file_get_contents($nombre_archivo);
$archivo = fopen($nombre_archivo, "r");
while (($line = fgets($archivo)) != false) {
    list($usuario, $passwd, $nom, $dir, $tlf, $visaantigua)= explode(":", $line);
    if ($usuario == $user && $password == $passwd) {
        $correcto = true;
    }
}
fclose($archivo);
if($correcto == true) {
    session_start();
    $_SESSION['identificador']= TRUE;
    $_SESSION['user'] = $user;
    header("refresh: 0; url=ok_login.php");
} else {
    header("refresh: 0; url=login.php");
}
?> 


