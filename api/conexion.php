<?php
function conectarBD() {
    $host = '140.84.168.240';
    $db = 'solicitudes';
    $user = 'Admin';
    $pass = 'SissaDigital$1';
    $port = 3306;  

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(["error" => "Error en la conexión"]);
        exit;
    }

    return $conn;
}
?>
