<?php
session_start();

// Para conectarse a la base de datos
require_once "conexion.php";

// Comprobar si se ha enviado el formulario
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Verificar que los campos no esten vacios
if (empty($email) || empty($password)) {
    echo "Por favor, complete todos los campos.";
    exit;
}

// Preparar la consulta para evitar inyecciones SQL
$stmt = $conn->prepare("SELECT * FROM personal WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
$empleado = $resultado->fetch_assoc();

// Verificar si el empleado existe
if ($empleado && password_verify($password, $empleado['password_hash'])) {
    $_SESSION['personal'] = $empleado['nombre'];

    // Redirigir al panel de control
    header("Location: panel_control.php");
} else {
    echo "Correo electrónico o contraseña incorrectos.";
}
?>