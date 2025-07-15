<?php
$host = "localhost";           // o la IP del servidor (ej. 127.0.0.1)
$usuario = "tu_usuario";       // por ejemplo: root
$contrasena = "tu_contrasena"; // por ejemplo: root o sin contraseña
$base_de_datos = "consultoria";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos '$base_de_datos'";
}

$conn->close();
?>
