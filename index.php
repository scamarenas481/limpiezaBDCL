<?php
session_start();

if (isset($_SESSION['usuario'])) {
    // Si hay una sesión activa, redirigir a menu.php
    header('Location: /limpiezaCL/limpiezaBDCL/app/vistas/menu.php');
    exit();
} else {
    // Si no hay una sesión activa, redirigir a login.php
    header('Location: /limpiezaCL/limpiezaBDCL/app/vistas/login.php');
    exit();
}
?>