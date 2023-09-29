<?php
// Incluye el archivo de conexión a la base de datos
@include 'conexion.php';
// Inicia una sesión de PHP para rastrear la autenticación del usuario
session_start();
// Verifica si se ha enviado el formulario
if(isset($_POST['submit'])){
   // Escapa y recoge los datos del formulario
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);// Hash de la contraseña (no es una práctica segura)
   $cpass = md5($_POST['cpassword']); // Hash de la confirmación de contraseña
   $user_type = $_POST['user_type']; // Hash del tipo de usuario
   // Consulta para buscar el usuario en la base de datos
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   // Ejecuta la consulta
   $result = mysqli_query($conn, $select);
   // Comprueba si se encontró un usuario
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
      // Almacena el nombre del administrador en la sesión y redirige a la página de administrador
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){
        // Almacena el nombre del usuario en la sesión y redirige a la página de usuario
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
       // Si no se encontró un usuario, muestra un mensaje de error
      $error[] = 'Datos erroneos/Usuario inexistente!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema de Usuarios | Edgar Hernández</title>

   <link rel="stylesheet" href="http://localhost/Simple-login-Resgister/assets/css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Sistema de Usuarios (login)</h3>
      <?php
      // Verifica si existe un array de errores llamado '$error'
      if(isset($error)){
         // Muestra un mensaje de error en la página para cada error en el array $error
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Ingresa tu email">
      <input type="password" name="password" required placeholder="Ingresa tu contraseña">
      <input type="submit" name="submit" value="Iniciar Sesion" class="form-btn">
      <p>No tienes usuario? <a href="register.php">registrate ahora</a></p>
   </form>

</div>

<div class="footer-g">
    <p>&copy; 2023 Hecho por: Edgar Hernández.</p>
</div>

</body>
</html>