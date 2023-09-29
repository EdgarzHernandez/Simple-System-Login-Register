
<?php
// Incluye el archivo de conexión a la base de datos
@include 'conexion.php';
// Inicia una sesión de PHP
session_start();
// Verifica si no existe la variable de sesión 'admin_name', lo que indica que el usuario no ha iniciado sesión como administrador
if(!isset($_SESSION['admin_name'])){
   // Redirige al usuario de vuelta a la página de inicio si no ha iniciado sesión como administrador
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema de Usuarios | Admin Page</title>

   <link rel="stylesheet" href="http://localhost/Simple-login-Resgister/assets/css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Que tal, <span>admin</span></h3>
      <h1>Bienvenid@ <span><?php echo $_SESSION['admin_name']// Accede a la variable de sesión 'admin_name' y la imprime en la página web ?></span></h1>
      <p>Al Admin Page</p>
      <a href="index.php" class="btn">login</a>
      <a href="register.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>
   
</div>

<div class="footer-dash">
      <p>&copy; 2023 Hecho por: Edgar Hernández.</p>
</div>

</body>
</html>