<?php
$user = $_POST['user'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$visa = $_POST['visa'];
$nombre_archivo= "usuarios.txt";

if(file_exists($nombre_archivo)){ 
   $usuario_existe= file_get_contents("./usuarios.txt");
   echo $usuario_existe;
   if(strpos($usuario_existe,$user)!=false){
      echo "El usuario ya existe.";
   } else {
      $linea = $user.':'.$password.':'.$nombre.':'.$direccion.':'.$telefono.':'.$visa;
      if ($archivo = fopen($nombre_archivo, "a")) {
         fwrite($archivo,$linea."\r\n");
         fclose($archivo);

         $linealogin = $user.':'.$password;

         $archivologin = fopen("login.txt", "a");
         fwrite($archivologin, $linealogin."\r\n");
         fclose($archivologin);

         session_start();
         $_SESSION['user'] = $user;
         $_SESSION['identificador'] = TRUE;
         header("refresh: 0; url=ok_login.php");
      }  
   }
}
?>