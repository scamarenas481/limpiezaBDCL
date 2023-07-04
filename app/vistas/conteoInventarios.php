<?php
$currentPage = 'conteo';
ini_set('session.gc_maxlifetime', 60); // 900 segundos = 15 minutos
session_set_cookie_params(60);
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
// Obtener el id del usuario conectado
$usuario = $_SESSION['usuario'];
$idUsuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteo de Inventario</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/bootstrap.css">
    <!-- Enlace al archivo CSS global -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/global.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h1>Productos</h1>
        <h1>Bienvenido, <?php echo $_SESSION['id_usuario'];
                        echo $_SESSION['usuario']; ?></h1>

        <div class="table-responsive">
            <form action="../../app/controlador/guardar_cambios.php" method="POST">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Clave ID</th>
                            <th>Descripción</th>
                            <th>Línea</th>
                            <th>Existencias</th>
                            <th>Control de Almacén</th>
                            <th>Conteo</th>
                            <th>Contado</th>
                            <th>Unidad de Entrada</th>
                            <th>Factor entre Unidades</th>
                            <th>Unidad de Salida</th>
                            <th>Clave Alterna</th>
                            <th>Código de Proveedor</th>
                            <th>Estatus</th>
                            <th>Fecha Movimiento</th>
                            <th>Usuario</th>
                            <th>Existe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consulta para obtener los datos de la tabla productos
                        $consulta = "SELECT p.claveId, p.descripcion, p.linea, p.unidadEntrada, p.unidadSalida,\n"
                            . "p.codigoProveedor, p.claveAlterna, p.controlAlmacen,\n"
                            . "p.estatus, p.existencias, p.factorUnidades, p.conteo, p.contado, p.existe,\n"
                            . "p.fechaMov, u.Usuario AS usuario\n"
                            . "FROM productos p\n"
                            . "INNER JOIN usuarios u ON p.IdUsuario = u.id;";

                        // Ejecuta la consulta
                        $resultado = $conn->query($consulta);

                        if ($resultado->num_rows > 0) {
                            // Recorre los resultados y muestra los datos en la tabla
                            while ($row = $resultado->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row['claveId'] . "</td>
                                    <td>" . $row['descripcion'] . "</td>
                                    <td>" . $row['linea'] . "</td>
                                    <td>" . $row['existencias'] . "</td>
                                    <td>" . $row['controlAlmacen'] . "</td>
                                    <td>
    <input type='text' name='conteo[]' value='" . $row['conteo'] . "'>
    <input type='hidden' name='claveId[]' value='" . $row['claveId'] . "'>
    <input type='hidden' name='existe[]' value='" . $row['existe'] . "'>
    <input type='hidden' name='contado[]' value='" . $row['contado'] . "'>
</td>
<td>
    <input type='checkbox' name='contado_checkbox[]' " . ($row['contado'] == 1 ? 'checked' : '') . " value='" . $row['claveId'] . "'>
</td>
<td>" . $row['unidadEntrada'] . "</td>
                                    <td>" . $row['factorUnidades'] . "</td>
                                    <td>" . $row['unidadSalida'] . "</td>
                                    <td>" . $row['claveAlterna'] . "</td>
                                    <td>" . $row['codigoProveedor'] . "</td>
                                    <td>" . $row['estatus'] . "</td>
                                    <td>" . $row['fechaMov'] . "</td>
                                    <td>" . $row['usuario'] . "</td>
                                    <td>
                                    <input type='checkbox' name='existe_checkbox[]' " . ($row['existe'] == 1 ? 'checked' : '') . " value='" . $row['claveId'] . "'>
                                </td>                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>