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
    <a href="cerrar_sesion.php">Cerrar sesión</a> <br>
    <a href="comandas_admin.php">Editar comandas</a> <br>
    <a href="usuarios_admin.php">Usuarios</a>
    <h1>Lista de productos</h1>
    <?php
        $archivo = fopen("productos.txt", "r");
        $contador = 1;
        while (($line = fgets($archivo)) != false) {
            list($nombre, $precio) = explode(":", $line);
            echo $contador++.": ".$nombre.", precio: ".$precio."€ <br>";
        }
        fclose($archivo);
    ?>
    <h1>Añadir producto</h1>
    <form action= "nuevoproducto.php" method="POST">
        <label>Nombre: </label>
        <input type="text" name="nombre" required/><br>
        <label>Precio: </label>
        <input type="text" name="precio" required/><br><br>
        <input type="submit" value="Enviar"/>
    </form>
    <h1>Modificar producto</h1>
    <form action= "modificarproducto.php" method="POST">
        <label>Nombre: </label>
        <input type="text" name="nombre" required/><br>
        <label>Nuevo Precio: </label>
        <input type="text" name="precio" required/><br><br>
        <input type="submit" value="Enviar"/>
    </form>
    <h1>Eliminar producto</h1>
    <form action= "eliminarproducto.php" method="POST">
        <label>Nombre: </label>
        <input type="text" name="nombre" required/><br>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>