<?php
// Habilitar CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once __DIR__ . '/connetion.php';

    // Sanitizar datos
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $empresa = htmlspecialchars(trim($_POST['empresa']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Guardar en la base de datos
    $sql = "INSERT INTO solicitudes (nombre, empresa, email, telefono, mensaje) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("sssss", $nombre, $empresa, $email, $telefono, $mensaje);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Enviar correo
    $destinatario = "oscar.viloria@block256.com.mx"; // ← Cambia esto por tu correo real
    $asunto = "Nueva solicitud de contacto";
    $contenido = "
        Has recibido una nueva solicitud desde el formulario:

        Nombre: $nombre
        Empresa: $empresa
        Email: $email
        Teléfono: $telefono
        Mensaje: $mensaje
    ";
    $cabeceras = "From: sandy.paez@sissamx.com\r\n" .
                 "Reply-To: $email\r\n" .
                 "Content-Type: text/plain; charset=UTF-8";

    mail($destinatario, $asunto, $contenido, $cabeceras);

    // Puedes redirigir o mostrar un mensaje
    echo "Gracias por tu mensaje. Fue enviado correctamente.";

    exit;
} else {
    echo "Solo peticiones POST";
}