<?php
session_start();
if(isset($_SESSION['identificador'])){
   $identificador = $_SESSION['identificador'];
   $user = $_SESSION['user'];
}
if ($identificador == TRUE){
    echo '<b>Bienvenido/a: '.$user.'</b><br>';              
    echo '<br>';
    
}else{
    echo "<script>location.href = 'login.php'</script>";
}
?>
<a href="cerrar_sesion.php">Cerrar sesión</a><br>
<a href="ok_login.php">Volver</a><br><br>
<?php
$nombre_archivo = "usuarios.txt";
$archivocompleto= file_get_contents($nombre_archivo);
$archivo = fopen($nombre_archivo, "r");
while (($line = fgets($archivo)) != false) {
    list($usuario, $contrasena, $nombre, $direccion, $telefono, $visa)= explode(":", $line);
    if ($usuario == $user) {
        ?>
        <h2>Datos: </h2>
        <label><b>Usuario: </b></label> 
        <input  type="text" value="<?php echo $usuario;?>" disabled> <br>
        <label><b>Contraseña: </b></label> 
        <input  type="password" value="<?php echo $contrasena;?>" disabled><br>
        <label><b>Nombre: </b></label> 
        <input  type="text" value="<?php echo $nombre;?>" disabled ><br>
        <label><b>Dirección: </b></label> 
        <input  type="text" value="<?php echo $direccion;?>" disabled ><br>
        <label><b>Teléfono: </b></label> 
        <input  type="text" value="<?php echo $telefono;?>" disabled ><br>
        <label><b>Visa: </b></label> 
        <input  type="text" value="<?php echo $visa;?>" disabled >
        
        <h2>Modificar datos: </h2>
        <form action="modificarperfil.php" method="POST">
            <label><b>Usuario: </b></label> 
            <input  type="text" name="user" value="<?php echo $usuario;?>" disabled> <br>
            <label><b>Contraseña: </b></label> 
            <input  type="password" name="password" value="<?php echo $contrasena;?>"><br>
            <label><b>Nombre: </b></label> 
            <input  type="text" name="nombre" value="<?php echo $nombre;?>"><br>
            <label><b>Dirección: </b></label> 
            <input  type="text" name="direccion" value="<?php echo $direccion;?>"><br>
            <label><b>Teléfono: </b></label> 
            <input  type="text" name="telefono" value="<?php echo $telefono;?>"><br>
            <label><b>Visa: </b></label> 
            <input  type="text" name="visa" value="<?php echo $visa;?>"><br><br>
            <input type="submit" value="Aceptar"> <br><br>
        </form>
<?php
    }
}
?>