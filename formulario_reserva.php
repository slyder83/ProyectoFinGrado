<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar mesa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <img src="assets/imagenes/minha-baek-Z073P3hgGdM-unsplash.jpg" alt="Foto de Minha Baek en Unsplash" width="2400" height="1501">
        <div class="header__opacidad"></div>
        <h1 class="header__titulo">Reserva la mesa</h1>
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
        <div class="pagina-reserva">
            <div class="formulario__contenido ancho-max sombra">
                <!-- Formulario para hacer las reservas con sus datos indicados -->
                <form action="procesar_reservas.php" method="POST" class="formulario__reservas">
                    <div class="formulario__grupo">
                        <label for="nombre_cliente">Nombre:</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" required>
                    </div>

                    <div class="formulario__grupo">
                        <label for="telefono">Teléfono:</label>
                        <input type="number" name="telefono" id="telefono" required>
                    </div>

                    <div class="formulario__grupo">                        
                        <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="formulario__cita">
                        <div class="formulario__grupo">            
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" required>
                        </div>
    
                        <div class="formulario__grupo">            
                            <label for="hora">Hora:</label>
                            <select name="hora" id="hora" required>
                                <option value="">Seleccionar hora</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                                <option value="22:00">22:00</option>
                                <option value="22:30">22:30</option>
                            </select>
                        </div>
                    </div>

                    <div class="formulario__grupo">            
                        <label for="n_personas">Número de personas:</label>
                        <select name="n_personas" id="n_personas" required>
                            <option value="">Seleccionar</option>
                            <option value="1">1 persona</option>
                            <option value="2">2 personas</option>
                            <option value="3">3 personas</option>
                            <option value="4">4 personas</option>
                            <option value="5">5 personas</option>
                            <option value="6">6 personas</option>
                            <option value="7">7 personas</option>
                            <option value="8">8 personas</option>
                        </select>
                    </div>        
        
                     <button type="submit" class="boton-reserva">Reservar una mesa</button>
                </form>
            </div>
        </div>
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
                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <svg class="red-social" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
                        </a>
                        <a href="#" title="Instagram" aria-label="Instagram">
                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <svg class="red-social" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                        </a>
                        <a href="#" title="X" aria-label="X">
                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <svg class="red-social" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
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