<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión activa, redirigir a login.php
    header('Location: /limpiezaCL/limpiezaBDCL/app/vistas/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/bootstrap.css">
    <!-- Enlace al archivo CSS global -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/global.css">
    
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }
        
        .logoMenu {
            width: 150px;
            margin-bottom: 20px;
        }
        
        .menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 150px; /* Ancho máximo igual al ancho de la imagen */
        }
        
        .menu button {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logoMenu" src="/../limpiezaCL/limpiezaBDCL/app/recursos/images/naranja1.png" alt="Logo">
        
        <div class="menu text-center">
            <button class="btn btn-primary mb-2" type="button" onclick="window.location.href = '/limpiezaCL/limpiezaBDCL/app/vistas/productos.php'">Inventario Inicial</button>
            <button class="btn btn-primary mb-2" type="button" onclick="window.location.href = '/limpiezaCL/limpiezaBDCL/app/vistas/revision.php'">Revisión</button>
            <button class="btn btn-primary mb-2" type="button" onclick="window.location.href = '/limpiezaCL/limpiezaBDCL/app/vistas/faltantes.php'">Faltantes</button>
            <button class="btn btn-primary mb-2" type="button" onclick="window.location.href = '/limpiezaCL/limpiezaBDCL/app/vistas/descontinuados.php'">Baja Productos</button>
            <button class="btn btn-primary mb-2" type="button" onclick="window.location.href = '/limpiezaCL/limpiezaBDCL/app/vistas/reestructura.php'">Reestructura</button>
        </div>
    </div>

</body>
</html>
