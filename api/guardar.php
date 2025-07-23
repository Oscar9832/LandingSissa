<?php
// 1. DATOS DE CONEXIÓN A BD EXTERNA
$host = "localhost"; // IP del servidor de BD          // Puerto MySQL
$dbname = "formulario";
$user = "root";
$pass = "";

// 2. CONECTAR A LA BASE DE DATOS
$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// 3. CAPTURAR DATOS DEL FORMULARIO
$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// 4. GUARDAR EN BASE DE DATOS
$sql = "INSERT INTO consultas (nombre, empresa, email, telefono, mensaje)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $empresa, $email, $telefono, $mensaje);
$stmt->execute();
$stmt->close();

// 5. ENVIAR CORREO
$destinatario = "tucorreo@dominio.com"; // <-- cambia esto
$asunto = "Nueva solicitud de consultoría";
$contenido = "Has recibido una nueva solicitud:\n\n" .
             "Nombre: $nombre\n" .
             "Empresa: $empresa\n" .
             "Correo: $email\n" .
             "Teléfono: $telefono\n" .
             "Mensaje:\n$mensaje";

$headers = "From: $email";

mail($destinatario, $asunto, $contenido, $headers);

// 6. REDIRECCIONAR O RESPONDER
echo "Gracias por tu mensaje. Nos pondremos en contacto pronto.";
?>
