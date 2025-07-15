<?php
// 1. Obtener datos del formulario
$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// 2. Conectar con la base de datos MySQL
$host = "140.84.168.240";          
$puerto = "3306"
$usuario = "Admin";      // ej. root
$contrasena = "SissaDigital$1"; // ej. root o la que tengas
$base_de_datos = "Formulario_sissa";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// 3. Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "✅ Conexión exitosa a MySQL en Oracle Cloud";

// 4. Insertar datos en la base
$sql = "INSERT INTO solicitudes (nombre, empresa, email, telefono, mensaje) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $empresa, $email, $telefono, $mensaje);
$stmt->execute();
$stmt->close();
$conn->close();

// 5. (Opcional) Enviar correo de confirmación
mail($email, "Confirmación de solicitud", "Gracias por contactarnos, $nombre. Te responderemos pronto.", "From: oscar.viloria@block256.com.mx");

// 6. Mostrar mensaje de éxito o redirigir
echo "Formulario enviado correctamente.";
?>
