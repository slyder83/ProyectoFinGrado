<?php
// Para conectarse a la base de datos
require_once "conexion.php";

// Comprobar los datos de formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST['nombre_cliente'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $n_personas = $_POST['n_personas'];

    // Validar que los datos no estén vacios
    if (empty($nombre_cliente) || empty($telefono) || empty($email) || empty($fecha) || empty($hora) || empty($n_personas)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO reservas (nombre_cliente, telefono, email, fecha, hora, n_personas) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssi", $nombre_cliente, $telefono, $email, $fecha, $hora, $n_personas);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        die( "Error al realizar la reserva: " . $stmt->error);
    } else {
        echo "<script>
            alert('La reserva ha sido realizada con éxito.');
            window.location.href = 'index.html';
        </script>";
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>