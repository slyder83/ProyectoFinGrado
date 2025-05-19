<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de mesa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Reservar una mesa</h2>

    <!-- Formulario para hacer las reservas con sus datos indicados -->
    <form action="procesar_reservas.php" method="POST">
        <label for="nombre_cliente">Nombre:</label>
        <input type="text" name="nombre_cliente" id="nombre_cliente" required>

        <label for="telefono">Teléfono:</label>
        <input type="number" name="telefono" id="telefono" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" required>

        <label for="n_personas">Número de personas:</label>
        <input type="number" name="n_personas" id="n_personas" required>

        <input type="submit" value="Reservar">
    </form>
</body>
</html>