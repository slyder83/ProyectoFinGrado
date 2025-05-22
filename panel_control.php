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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <img src="assets/imagenes/minha-baek-Z073P3hgGdM-unsplash.jpg" alt="Foto de Minha Baek en Unsplash" width="2400" height="1501">
        <div class="header__opacidad"></div>
        <h1 class="header__titulo">Panel de gestión</h1>
    </header>
    
    <nav id="navbar">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="formulario_reserva.php">Reservas</a></li>
            <li><a href="#sobre-nosotros">Sobre nosotros</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div id="nav-placeholder"></div>

    <main>
        <div class="panel__principal">
            <div class="panel__contenido ancho-max sombra">
                <div class="cabecera__contenido">
                    <h1>
                        <svg class="icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg>
                        Panel de Control
                    </h1>
                    <div class="usuario-informacion">
                        <h3><span>Bienvenido, <?php echo htmlspecialchars($_SESSION['personal']); ?></span></h3>
                        <a href="logout.php" class="boton-cerrar-sesion">
                            <svg class="icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            Cerrar sesión
                        </a>
                    </div>
                </div>

                <div class="tabla__principal sombra">
                    <div class="tabla__contenido">
                        <div class="tabla__cabecera">
                            <h2>Gestión de reservas</h2>
                        </div>
                    </div>
                </div>








            </div>
        </div>


        --------------
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
    </main>

    <footer>
        <div class="footer__contenido ancho-max">
            <div class="footer__informacion">
                <div class="footer__tarjeta">
                    <h4>Horario</h4>
                    <p class="small">Martes a Viernes: 12:00 - 23:00</p>
                    <p class="small">Sabados y Domingos: 13:00 - 23:00</p>
                    <p class="small">Lunes: Cerrado</p>
                </div>

                <div class="footer__tarjeta">
                    <h4>Dirección</h4>
                    <p class="small">Calle de la Gastronomía, 123</p>
                    <p class="small">Madrid, España</p>
                    <p class="small"><a href="https://www.google.com/maps?q=Calle+de+la+Gastronomía,+123,+Madrid,+España" target="_blank" rel="noopener noreferrer">Ver en Google Maps</a></p>
                </div>

                <div class="footer__tarjeta">
                    <h4>Contacto</h4>
                    <p class="small">+34 123 456 789</p>
                    <p class="small"><a href="mailto:info@restauranteasia.com">info@restauranteasia.com</a></p>
                </div>

                <div class="footer__tarjeta">
                    <h4>Redes Sociales</h4>
                    <div class="footer__redes-sociales">
                        <a href="#" title="Facebook" aria-label="Facebook">
                            <svg class="red-social" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
                        </a>
                        <a href="#" title="Instagram" aria-label="Instagram">
                            <svg class="red-social" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                        </a>
                        <a href="#" title="X" aria-label="X">
                            <svg class="red-social" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer__separador"></div>

            <div class="footer__legal">
                <p class="small">&copy; <span id="year"></span> Restaurante Asia Oriental. Todos los derechos reservados</p>
                <div class="footer__politicas">
                    <p class="small"><a href="politica_privacidad.html">Política de privacidad</a></p>
                    <p class="small"><a href="terminos_condiciones.html">Términos y condiciones</a></p>
                    <p class="small"><a href="cookies.html">Política de cookies</a></p>
                    <p class="small"><a href="aviso_legal.html">Aviso legal</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- <script src="js/script.js"></script> -->
    <script src="js/footer.js"></script>

</body>
</html>