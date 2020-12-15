<?php
require_once "Producto.php";
session_start();
if(isset($_SESSION['identificador'])){
$identificador = $_SESSION['identificador'];
$user = $_SESSION['user'];
if ($identificador == TRUE){
    echo '<b>Bienvenido/a: '.$user.'</b><br>';              
    echo '<br>';
    
}else{
    echo "<script>location.href = 'login.php'</script>";
}
}
?>
<html>
<head>
</head>
<body>
    <a href="cerrar_sesion.php">Cerrar sesión</a><br>
    <a href="carrito_completo.php">Ver carrito</a><br>
    <a href="datos_usuario.php">Ver perfil</a>
    <h1>Productos:</h1>
    <?php
        $archivo = fopen("productos.txt", "r");
        $contador = 1;
        while (($line = fgets($archivo)) != false) {
            list($nombre, $precio) = explode(":", $line);
            ?>
            <h2><?php echo $nombre ?></h2>
            <form action= "carrito.php" method="POST">
            <input type="hidden" name="Nombre_Producto" value="<?php echo $nombre; ?>"/><br>
            <label>Precio</label>
            <input type="text" name="Precio" value="<?php echo $precio; ?>€" readonly focus/><br>
            <label>Cantidad: </label>
            <input placeholder="Introduzca nº de productos"  type="text" name="cant" required/><br><br>
            <input type="submit" value="Añadir al carrito"/>
            </form>
    <?php
        }
        fclose($archivo);
    ?>
</body>

</html>