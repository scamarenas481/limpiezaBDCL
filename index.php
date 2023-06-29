<?php
session_start();

if (isset($_SESSION['usuario'])) {
    // Si hay una sesión activa, redirigir a menu.php
    header('Location: /limpiezaCL/app/vistas/menu.php');
    exit();
} else {
    // Si no hay una sesión activa, redirigir a login.php
    header('Location: /limpiezaCL/app/vistas/login.php');
    exit();
}
?>