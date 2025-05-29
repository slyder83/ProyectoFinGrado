<?php
// Para conectarse a la base de datos
require_once "conexion.php";

// Crear el personal administrador
$nombre = "administrador"; // Nombre del personal del restaurante
$email = "admin@restaurante.com"; // Correo electrónico del personal del restaurante
$password = "admin1234"; // Contraseña del personal del restaurante
$hash_password = password_hash($password, PASSWORD_DEFAULT); // Esto cifra la contraseña que se guarda en al base de datos

// Insertar el personal administrador
$stmt = $conn->prepare("INSERT INTO personal (nombre, email, password_hash) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $hash_password);

// Ejecutar la consulta
if (!$stmt->execute()) {
    die("Error al insertar el personal: " . $stmt->error);
} else {
    echo "El personal administrador ha sido creado con éxito.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>