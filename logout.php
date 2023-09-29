<?php
 // Incluye el archivo de conexión a la base de datos
@include 'config.php';
// Inicia una sesión de PHP
session_start();
// Elimina todas las variables de sesión y destruye la sesión
session_unset();
session_destroy();
// Redirige de vuelta a la página de inicio
header('location:index.php');

?>