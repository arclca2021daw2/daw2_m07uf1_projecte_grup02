<?php
session_start();
if(isset($_SESSION['identificador'])){
session_destroy();
header ("refresh:0;url=login.php");
}
?>