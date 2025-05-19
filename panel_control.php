<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['personal'])) {
    header("Location: login.php");
    exit;
}

// Conexión a la base de datos
require_once "conexion.php";

// Obtener las reservas
$reservas = $conn->query("SELECT * FROM reservas ORDER BY fecha DESC, hora DESC");
if (!$reservas) {
    die("Error al obtener las reservas: " . $conn->error);
}
?>

<h2>Panel de gestión</h2>
<h3>Bienvenido <?php echo $_SESSION['personal']; ?></h3>
<a href="logout.php">Cerrar sesión</a>

<table border="1">
    <tr>
        <td>Nombre</td>
        <td>Teléfono</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Nº Personas</td>
        <td>Estado</td>
        <td>Modificar</td>
    </tr>
    <?php while ($reserva = $reservas->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($reserva['nombre_cliente']); ?></td>
            <td><?php echo htmlspecialchars($reserva['telefono']); ?></td>
            <td><?php echo htmlspecialchars($reserva['fecha']); ?></td>
            <td><?php echo htmlspecialchars($reserva['hora']); ?></td>
            <td><?php echo htmlspecialchars($reserva['n_personas']); ?></td>
            <td><?php echo htmlspecialchars($reserva['estado']); ?></td>
            <td>
                <form method="POST" action="modificar_estado.php">
                    <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">
                    <select name="estado">
                        <option value="pendiente" <?php if ($reserva['estado'] == 'pendiente') echo 'selected'; ?>>pendiente</option>
                        <option value="en_proceso" <?php if ($reserva['estado'] == 'en_proceso') echo 'selected'; ?>>en proceso</option>
                        <option value="completada" <?php if ($reserva['estado'] == 'completada') echo 'selected'; ?>>completada</option>
                        <option value="cancelada" <?php if ($reserva['estado'] == 'cancelada') echo 'selected'; ?>>cancelada</option>
                    </select>
                    <input type="submit" value="Modificar">
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>