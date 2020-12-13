<html>
<head>

</head>
<body >
         <h2>Login</h2>
         <form action= "usuario.php" method="POST">
            <label>Correo: </label>
            <input type="text" name="user"/><br>
            <label>Contraseña: </label>
            <input type="password" name="password"/><br><br>
            <input type="submit" value="Enviar"/>
         </form>
          <h2>Registro</h2>
          <form action= "registro.php" method="POST">
            <label>Correo: </label>
            <input type="text" name="user" required/><br>
            <label>Contraseña: </label>
            <input type="password" name="password" required/><br>
            <label>Nombre: </label>
            <input type="text" name="nombre" required/><br>
            <label>Dirección: </label>
            <input type="text" name="direccion" required/><br>
            <label>Teléfono: </label>
            <input type="text" name="telefono" required/><br>
            <label>Visa: </label>
            <input type="text" name="visa" required/><br><br>
            <input type="submit" value="Enviar"/>
         </form>
         <h2>Login Admin</h2>
         <form action= "admin.php" autocomplete="off" method="POST">
            <label>Correo: </label>
            <input type="text" name="user"/><br>
            <label>Contraseña: </label>
            <input type="password" name="password"/><br><br>
            <input type="submit" value="Enviar"/>
         </form>
</html>
