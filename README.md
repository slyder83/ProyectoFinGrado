# ProyectoFinGrado

## Sistema de Reservas - Restaurante Asia Oriental

### Descripción del Proyecto
Creacion de una pagina web para la gestion de reservas de una restaurante. La web permite a los clientes realizar reservas online y al personal del restaurante gestionar las reservas desde el panel de control. El sistema esta diseñado para mejorar al experiencia del cliente y optimizar la gestion del restaurante.

### Características Principales

#### Página Principal (Frontend)
- Diseño moderno y responsive
- Secciones principales:
  - Página de inicio con presentación del restaurante
  - Platos destacados
  - Sección "Sobre nosotros"
  - Sistema de reservas online

#### Sistema de Reservas
- Formulario de reserva con los siguientes campos:
  - Nombre del cliente
  - Teléfono
  - Correo electrónico
  - Fecha de reserva
  - Hora (franjas horarias predefinidas)
  - Número de personas (1-8)

#### Panel de Control (Backend)
- Sistema de autenticación para el personal
- Gestión de reservas:
  - Visualización de todas las reservas
  - Modificación del estado de las reservas
  - Ordenación por fecha y hora

### Tecnologías Utilizadas
- Frontend:
  - HTML5
  - CSS3
  - JavaScript
- Backend:
  - PHP
  - MySQL
  - PHPMailer para envío de correos
- Herramientas Adicionales
  - Git (control de versiones)
  - Visual Studio Code (editor de código)
  - Xampp (gestión de base de datos)

### Estructura del Proyecto
```plaintext
/
├── assets/
│   ├── fonts/                # Fuentes Montserrat
│   └── imagenes/             # Imágenes del sitio
├── css/
│   └── styles.css            # Estilos del sitio
├── js/
│   └── footer.js             # Scripts del pie de página
├── index.html                # Página principal
├── conexion.php              # Configuración de base de datos
├── formulario_reserva.php    # Formulario de reservas
├── insertar_personal.php     # Insercion del personal
├── login.php                 # Página de inicio de sesión
├── logout.php                # Cierre de sesión
├── modificar_estado.php      # Procesamiento de la modificacion del estado de las reservas
├── panel_control.php         # Panel de administración
├── verificar_login.php       # Verifica los datos del personal
└── procesar_reservas.php     # Procesamiento de reservas
```

### Requisitos de Instalación
1. Servidor XAMPP con PHP y MySQL
2. Composer para gestión de dependencias
3. Base de datos MySQL

### Configuración
1. Clonar el repositorio
2. Ejecutar `composer install` para instalar dependencias
3. Configurar los parámetros de conexión en `conexion.php`
4. Importar la estructura de la base de datos
5. Configurar los permisos de directorios necesarios

### Características de Seguridad
- Autenticación del personal para el panel de control
- Validación de formularios
- Protección contra inyeccion SQL
- Gestión segura de sesiones

### Mantenimiento
1. Realizar copias de seguridad regulares de la base de datos
2. Actualizar las dependencias cuando sea necesario
3. Monitorizar el registro de errores del servidor
4. Revisar y actualizar el contenido periódicamente

## Agradecimientos
- Universidad Alfonso X - UAX
- Profesores y tutores
- Compañeros de desarrollo
- Comunidad open source