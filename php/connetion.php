<?php
$host = "140.84.168.240";          
$usuario = "Admin";      
$contrasena = "SissaDigital$1";
$base_de_datos = "Formulario_sissa";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos '$base_de_datos'";
}


?>

