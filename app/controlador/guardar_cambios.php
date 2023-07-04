<?php
require_once __DIR__ . '/../../config.php';

ini_set('session.gc_maxlifetime', 60); // 900 segundos = 15 minutos
session_set_cookie_params(60);

// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../modelo/DAO/UsuarioDAO.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 900) {
    // Si ha pasado más de 15 minutos, destruir la sesión y redirigir al inicio de sesión
    session_unset();
    session_destroy();
    header('Location: /limpiezaCL/limpiezaBDCL/app/vistas/login.php');
    exit();
}

$_SESSION['last_activity'] = time();

// Obtener el id del usuario conectado
$usuario = $_SESSION['usuario'];
$idUsuario = $_SESSION['id_usuario'];

require_once __DIR__ . '/../../config.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados del formulario
    $conteos = $_POST['conteo'];
    $clavesId = $_POST['claveId'];
    $existeCheckbox = $_POST['existe_checkbox'];
    $contadoCheckbox = $_POST['contado_checkbox'];
    $userId = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
 

    // Reindexar los arrays
 
    if ($userId) {
        // Preparar la consulta SQL
       //$stmt = $conn->prepare("UPDATE productos SET conteo = ?, contado = ?, existe = ?, IdUsuario = ? WHERE claveId = ?");
    
        // Vincular parámetros y ejecutar la consulta para cada producto
        foreach ($clavesId as $index => $claveId) {
            $stmt = $conn->prepare("UPDATE productos SET conteo = ?, contado = ?, existe = ?, IdUsuario = ? WHERE claveId = ?");
            $conteo = $conteos[$index];
            $existe = isset($existeCheckbox[$index]) ? 1 : 0;
            $contado = isset($contadoCheckbox[$index]) ? 1 : 0;
    
            $stmt->bind_param("iiiis", $conteo, $contado, $existe, $userId, $claveId);
            $stmt->execute();
        }
    
        $stmt->close();
        $conn->close();
    
        header('Location: /limpiezaCL/limpiezaBDCL/app/vistas/productos.php');
        exit();
    } else {
        echo "Error: No se ha proporcionado el ID del usuario.";
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}
?>
