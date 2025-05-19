<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al personal a la página de login
header("Location: login.php");
?>