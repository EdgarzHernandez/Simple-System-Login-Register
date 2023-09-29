<?php
// Incluye el archivo de conexión a la base de datos
@include 'conexion.php';
// Verifica si se ha enviado el formulario de registro
if(isset($_POST['submit'])){
   // Escapa y recoge los datos del formulario
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);// Hash de la contraseña (no es una práctica segura)
   $cpass = md5($_POST['cpassword']);// Hash de la confirmación de contraseña
   $user_type = $_POST['user_type']; // Hash del tipo de usuario
   // Consulta para buscar el usuario en la base de datos
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   // Ejecuta la consulta
   $result = mysqli_query($conn, $select);

   // Comprueba si ya existe un usuario con el mismo correo electrónico y contraseña
   if(mysqli_num_rows($result) > 0){

      $error[] = 'Usuario ya registrado!';
   
   }else{
      // Comprueba si las contraseñas coinciden
      if($pass != $cpass){
         $error[] = 'La contraseña no coinciden!';
      }else{
         // Inserta el nuevo usuario en la base de datos
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema de Usuarios | Formulario de Registro</title>

   <link rel="stylesheet" href="http://localhost/Simple-login-Resgister/assets/css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Registrate Ahora</h3>
      <?php
      // Verifica si existe un array de errores llamado '$error'
      if(isset($error)){
         // Muestra un mensaje de error en la página para cada error en el array $error
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Ingresa tu nombre">
      <input type="email" name="email" required placeholder="Ingresa tu email">
      <input type="password" name="password" required placeholder="Ingresa tu contraseña">
      <input type="password" name="cpassword" required placeholder="confirma tu contraseña">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="Crear Usuario" class="form-btn">
      <p>ya tienes usuario? <a href="index.php">login</a></p>
   </form>

</div>

<div class="footer-r">
   <p>&copy; 2023 Hecho por: Edgar Hernández.</p>
</div>

</body>
</html>