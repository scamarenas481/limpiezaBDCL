<?php
ini_set('session.gc_maxlifetime', 900); // 900 segundos = 15 minutos
session_set_cookie_params(900);
session_start();
require_once __DIR__ . '/../../config.php';

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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una instancia del DAO y pasar la conexión a la base de datos
    $usuarioDAO = new UsuarioDAO($conn);


    // Validar las credenciales utilizando el DAO
    if ($usuarioDAO->validarCredenciales($username, $password)) {
        // Las credenciales son válidas, el usuario puede iniciar sesión
        $_SESSION['usuario'] = $username;
        $_SESSION['id_usuario'] = $idUsuario; // Por ejemplo, el ID del usuario obtenido de la base de datos
        // Reiniciar el tiempo de actividad de la sesión
        $_SESSION['last_activity'] = time();
        header('Location: /limpiezaCL/limpiezaBDCL/app/vistas/menu.php');
        exit();
    } else {
        // Las credenciales son inválidas, mostrar un mensaje de error o realizar acciones adicionales
        echo "Credenciales inválidas. Por favor, verifica tus datos e intenta nuevamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/bootstrap.css">
    <!-- Enlace al archivo CSS global -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/global.css">

</head>

<body class="text-center">
    <main class="form-signin">
        <form action="/../limpiezaCL/limpiezaBDCL/app/vistas/login.php" method="POST">
            <img class="mb-4 logo" src="/../limpiezaCL/limpiezaBDCL/app/recursos/images/naranja1.png" alt="Logo" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                <label for="username">Nombre de usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                <label for="password">Contraseña</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
        </form>
    </main>
    <!-- Enlace al archivo JavaScript de Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>