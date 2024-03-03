<?php

require_once '../config.php';

class User {
    private $conn;

    public function __construct($conexion) {
        // Utiliza la conexión a la base de datos proporcionada
        $this->conn = $conexion;
    }

    
     public function registerUser() {
        // Método para registrar un nuevo usuario.
        if (isset($_POST['register'])) {
            // Obtener los datos del formulario
            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $clave = isset($_POST['clave']) ? trim($_POST['clave']) : null;
    
            // Inicializar un array para almacenar mensajes de error
            $errores = array();

            // Validar los datos
            if (empty($nombre) || empty($email) || empty($clave)) {
                $errores[] = "Todos los campos son obligatorios. Por favor, completa el formulario.";
            }
            if (!preg_match("/^[a-zA-Z]+$/", $nombre)) {
                $errores[] = "El nombre debe contener solo letras.";
            }
            // Validar el formato del correo electrónico
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "El formato del correo electrónico no es válido.";
            }

            // Validar la fortaleza de la contraseña (puedes ajustar los requisitos según sea necesario)
            if (strlen($clave) < 8) {
                $errores[] = "La contraseña debe tener al menos 8 caracteres.";
            }
    
            // Si hay errores, almacenarlos en variables de sesión y redirigir al formulario
            if (!empty($errores)) {
                $_SESSION['errores'] = $errores;
                echo "<script>
                setTimeout(function(){
                    window.history.back();
                }, 3000); // Redirigir hacia atrás después de 3 segundos
              </script>";
        exit();
            }

            // Hash de la contraseña
            $hashedPassword = password_hash($clave, PASSWORD_DEFAULT);
    
            // Query preparada para insertar el usuario en la base de datos
            $query = "INSERT INTO persona (nombre, email, clave) VALUES (?, ?, ?)";
            
            // Preparar la consulta
            $stmt = $this->conn->prepare($query);
            
            // Vincular los parámetros
            $stmt->bind_param("sss", $nombre, $email, $hashedPassword);
    
            // Ejecutar la consulta
            $result = $stmt->execute();
    
            // Verificar el resultado de la consulta
            if ($result) {
                echo "Registro exitoso. Puedes iniciar sesión ahora.";
            } else {
                echo "Error al registrar. Por favor, inténtalo de nuevo.";
            }
        }
    }
       
}
      

session_start();
// Crear una instancia del controlador User con la conexión a la base de datos
$userHandler = new User($conexion);

// Verificar si se ha enviado el formulario y ejecutar el método correspondiente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'registerUser':
            $registroExitoso = $userHandler->registerUser();
            if ($registroExitoso) {
                echo "Registro exitoso. Puedes iniciar sesión ahora.";
            } else {
                echo "Error al registrar. Por favor, inténtalo de nuevo.";
            }
            break;
        // Agrega otros casos según sea necesario para tus otros métodos
        // case 'otroMetodo':
        //     $userHandler->otroMetodo();
        //     break;
        default:
            // Manejar acciones desconocidas o no especificadas
            break;
    }
}
?>



