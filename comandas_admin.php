<?php
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
<body>
<a href="cerrar_sesion.php">Cerrar sesión</a> <br>
<a href="ok_admin.php">Volver</a>
<h1>Lista de comandas</h1>
<?php
$carpeta = "carrito/";
$archivos = scandir($carpeta);
foreach($archivos as $a) {
    if($a != "." && $a != "..") {
        $usuario = substr($a, 0, -4);
        echo "<h2>Comandas usuario ".$usuario.":</h2>";
        $carrito_usuario="./carrito/$a";
        if (file_exists($carrito_usuario)){

        $carrito=fopen($carrito_usuario,"r");
        $total_final=0;

        while (($line = fgets($carrito)) != false){
            list($id, $producto, $cantidad, $precio)= explode("|", $line);
            if ($precio != NULL) {
                $total_final+=(int)$precio;
            ?>
                <h3>Comanda <?php echo $id; ?>:</h3>
                <input type="hidden" value="<?php echo $id; ?>">
                <input type="hidden" value="<?php echo $a; ?>">
                <label><b>Producto: </b></label> 
                <input  type="text" value="<?php echo $producto;?>" disabled>
                <label><b>Cantidad: </b></label> 
                <input  type="text" value="<?php echo $cantidad;?>" disabled>
                <label><b>Precio: </b></label> 
                <input  type="text" value="<?php echo $precio;?>€" disabled >
            <?php 
            } 
            ?>
            <?php  
        }	
        fclose($carrito);
        }
    }
}
?>
<h1>Borrar comanda</h1>
<form action="borrarcomanda.php" method="POST">
    <label>Usuario: </label>
    <input type="text" name="user" required/><br>
    <label>Id de comanda: </label>
    <input type="text" name="id" required/><br><br>
    <input type="submit" value="Borrar"/>
</form>

<h1>Modificar comanda</h1>
<form action="cambiarcomanda.php" method="POST">
    <label>Usuario: </label>
    <input type="text" name="user" required/><br>
    <label>Id de comanda: </label>
    <input type="text" name="id" required/><br>
    <label>Nueva cantidad: </label>
    <input type="text" name="cantidad" required/> <br><br>
    <input type="submit" value="Borrar"/>
</form>

</body>
</html>