<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once __DIR__ . '/connetion.php';

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $empresa = htmlspecialchars(trim($_POST['empresa']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    $sql = "INSERT INTO solicitudes (nombre, empresa, email, telefono, mensaje) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("sssss", $nombre, $empresa, $email, $telefono, $mensaje);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    exit;
} else {
    echo "Solo peticiones POST";
}
?>
