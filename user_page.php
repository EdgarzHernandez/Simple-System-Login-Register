
<?php
// Incluye el archivo de conexión a la base de datos
@include 'conexion.php';
// Inicia una sesión de PHP
session_start();
// Verifica si no existe la variable de sesión 'user_name', lo que indica que el usuario no ha iniciado sesión como usuario
if(!isset($_SESSION['user_name'])){
   // Redirige al usuario de vuelta a la página de inicio si no ha iniciado sesión como usuario
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema de Usuarios | User Page</title>

   <link rel="stylesheet" href="http://localhost/Simple-login-Resgister/assets/css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Hola, <span>user</span></h3>
      <h1>Bienvenid@ <span><?php echo $_SESSION['user_name'] // Accede a la variable de sesión 'user_name' y la imprime en la página web?></span></h1>
      <p>Al User Page</p>
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