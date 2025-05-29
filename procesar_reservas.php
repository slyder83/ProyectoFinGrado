<?php
// Para conectarse a la base de datos
require_once "conexion.php";

// Para poder usar despues PHPmailer
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Comprobar los datos del formulario
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
    if ($stmt->execute()) {
        // Dos instancias de PHPmailer para evitar  errores con el envio del correo al cliente
        // El uso del correo para el restaurante
        $emailRestaurante = new PHPMailer(true);

        try {
            // La configuración del SMTP del restaurante
            $emailRestaurante->isSMTP();
            $emailRestaurante->Host = 'smtp.gmail.com';
            $emailRestaurante->SMTPAuth = true;
            $emailRestaurante->Username = ''; // Aqui va el correo del restaurante
            $emailRestaurante->Password = ''; //Aqui va la contraseña
            $emailRestaurante->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $emailRestaurante->Port = 587;
            $emailRestaurante->CharSet = 'UTF-8';

            $emailRestaurante->setFrom('', 'Restaurante Asia Oriental');
            $emailRestaurante->addAddress('');
            $emailRestaurante->Subject = 'Nueva Reserva hecha - ' . $nombre_cliente;
            
            $mensaje_restaurante = "Se ha hecho una nueva reserva:\n\n";
            $mensaje_restaurante .= "Nombre: " . $nombre_cliente . "\n";
            $mensaje_restaurante .= "Teléfono: " . $telefono . "\n";
            $mensaje_restaurante .= "Email: " . $email . "\n";
            $mensaje_restaurante .= "Fecha: " . $fecha . "\n";
            $mensaje_restaurante .= "Hora: " . $hora . "\n";
            $mensaje_restaurante .= "Número de personas: " . $n_personas . "\n";

            $emailRestaurante->Body = $mensaje_restaurante;
            $emailRestaurante->send();

            // Uso del correo para el cliente (nueva instancia)
            $emailCliente = new PHPMailer(true);
            
            // Configuración del SMTP del cliente
            $emailCliente->isSMTP();
            $emailCliente->Host = 'smtp.gmail.com';
            $emailCliente->SMTPAuth = true;
            $emailCliente->Username = ''; // Aquí va el correo del restaurante
            $emailCliente->Password = ''; // Aquí va la contraseña
            $emailCliente->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $emailCliente->Port = 587;
            $emailCliente->CharSet = 'UTF-8';

            $emailCliente->setFrom('', 'Restaurante Asia Oriental');
            $emailCliente->addAddress($email, $nombre_cliente);
            $emailCliente->Subject = 'Confirmación de la reserva - Restaurante Asia Oriental';

            $mensaje_cliente = "Estimado/a " . $nombre_cliente . ",\n\n";
            $mensaje_cliente .= "Gracias por realizar su reserva. A continuación te mostramos los detalles:\n\n";
            $mensaje_cliente .= "Fecha: " . $fecha . "\n";
            $mensaje_cliente .= "Hora: " . $hora . "\n";
            $mensaje_cliente .= "Número de personas: " . $n_personas . "\n\n";
            $mensaje_cliente .= "Si tiene que modificar o cancelar su reserva, por favor pongase en contacto con nosotros via email.\n\n";
            $mensaje_cliente .= "Restaurante Asia Oriental";

            $emailCliente->Body = $mensaje_cliente;
            $emailCliente->send();

            echo "<script>\n";
            echo "alert('La reserva ha sido realizada con éxito.');\n";
            echo "window.location.href = 'index.html';\n";
            echo "</script>";

        } catch (Exception $e) {
            echo "Error al enviar el correo: {$e->getMessage()}";
        }
    } else {
        echo "Error al realizar la reserva";
    }        
    
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>