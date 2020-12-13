<?php
$user = $_POST['user'];
$password = $_POST['password'];
$admin_existe= file_get_contents("./admin.txt");
$comprobar=$user.":".$password;

echo $comprobar;
echo $admin_existe;

if(strpos($admin_existe,$comprobar)!=false){
    echo "el usuario está en el txt";
    session_start();
    $_SESSION['identificador']= TRUE;
    $_SESSION['user'] = $user;
    header('Location: ok_admin.php');
}

else{
    header('Location:login.php');
}
?> 