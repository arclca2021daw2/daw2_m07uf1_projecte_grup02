<?php
require_once "Producto.php";
session_start();
if(isset($_SESSION['identificador'])){
   $identificador = $_SESSION['identificador'];
   $user = $_SESSION['user'];
}
?>
<html>
<head>
</head>
<body>
    <h1 class="titulo">Productos de <?php echo $user ?>:</h1>
<?php 
$carrito_usuario="./carrito/$user.txt";
if (file_exists($carrito_usuario)){

   $carrito=fopen($carrito_usuario,"r");
   $total_final=0;

   while (($line = fgets($carrito)) != false){
      list($id, $producto, $cantidad, $precio)= explode("|", $line);
      if ($precio != NULL) {
         $total_final+=(int)$precio;
      ?>
         <h3>Comanda <?php echo $id; ?>:</h3>
         <label><b>Producto: </b></label> 
         <input  type="text" name="plaza" value="<?php echo $producto;?>" disabled>
         <label><b>Cantidad: </b></label> 
         <input  type="text" name="plaza" value="<?php echo $cantidad;?>" disabled>
         <label><b>Precio: </b></label> 
         <input  type="text" name="plaza" value="<?php echo $precio;?>€" disabled >
      </div>
      
      <?php 
      } 
      ?>


      <?php  
   }	
   fclose($carrito);
}
?>
<br><br>
<label><b>Precio Total: </b></label> 
<input type="text" name="plaza" value="<?php echo $total_final;?>€" disabled>
<h2>Eliminar comanda</h2>
<form action= "eliminarcomanda.php" method="POST">
   <label>Id comanda: </label>
   <input type="text" name="id" required/><br>
   <input type="submit" value="Enviar"/>
</form>
<h2>Modificar comanda</h2>
<form action= "modificarcomanda.php" method="POST">
   <label>Id comanda: </label>
   <input type="text" name="id" required/><br>
   <label>Nueva cantidad: </label>
   <input type="text" name="cantidad" required/><br>
   <input type="submit" value="Enviar"/>
</form>
</body>
</html>