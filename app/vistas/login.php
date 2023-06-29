<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Enlace al archivo CSS global -->
    <link rel="stylesheet" href="/app/recursos/css/global.css">
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="/app/recursos/css/bootstrap.min.css">
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="/app/controlador/login.php" method="POST">
            <img class="mb-4" src="/app/recursos/images/logo.png" alt="Logo" width="72" height="57">
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
