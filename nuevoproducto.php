<?php
require_once "Producto.php";
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$nombre_archivo= "productos.txt";

if(file_exists($nombre_archivo)){ 
    $producto_existe= file_get_contents("productos.txt");
    if(strpos($producto_existe,$nombre)!=false){
       echo "El producto ya existe.";
    } else {
        $producto = new Producto($nombre, $precio);
        header("refresh: 0; url=ok_admin.php");
    }  
}
?>