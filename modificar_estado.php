<?php
session_start();
require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_reserva = $_POST['id'];
    $estado = $_POST['estado'];

    // Actualizar el estado de la reserva
    $stmt = $conn->prepare("UPDATE reservas SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $estado, $id_reserva);

    if ($stmt->execute()) {
        echo "Estado actualizado correctamente.";
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }

    $stmt->close();

    // Redirigir al panel de control
    header("Location: panel_control.php");
    exit;
}
?>