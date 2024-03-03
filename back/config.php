<?php 
    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // Ajusta la ruta según sea necesario
$dotenv->load();
$host = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

$conexion = mysqli_connect($host, $user, $pass, $dbName);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}


?>