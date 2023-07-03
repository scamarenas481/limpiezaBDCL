<?php
$currentPage = 'productos';
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
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu sitio web</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/bootstrap.css">
    <!-- Enlace al archivo CSS global -->
    <link rel="stylesheet" href="/../limpiezaCL/limpiezaBDCL/app/recursos/css/global.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h1>Productos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Clave ID</th>
                    <th>Descripción</th>
                    <th>Línea</th>
                    <th>Unidad de Entrada</th>
                    <th>Unidad de Salida</th>
                    <th>Clave de Unidad</th>
                    <th>Código de Proveedor</th>
                    <th>Clave Alterna</th>
                    <th>Número de Fabricante</th>
                    <th>Control de Almacén</th>
                    <th>Estatus</th>
                    <th>Existencias</th>
                    <th>Factor de Unidades</th>
                    <th>Conteo</th>
                    <th>Contado</th>
                    <th>Fabricante ID</th>
                    <th>Marca ID</th>
                    <th>Clave SAT</th>
                    <th>Existe</th>
                    <th>Para Revisión</th>
                    <th>Para Reestructura</th>
                    <th>Fecha Movimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los datos de la tabla productos
                $consulta = $consulta = "SELECT p.claveId, p.descripcion, p.linea, p.unidadEntrada, p.unidadSalida,
                p.claveUnidad, p.codigoProveedor, p.claveAlterna, p.numeroFabricante, p.controlAlmacen,
                p.estatus, p.existencias, p.factorUnidades, p.conteo, p.contado, p.existe,
                p.paraRevision, p.paraReestructura, p.fechaMov, f.nombreFabricante AS fabricante, m.nombreMarca AS marca
                FROM productos p
                INNER JOIN fabricante f ON p.fabricanteId = f.id
                INNER JOIN marcas m ON p.marcaId = m.id";

                // Ejecuta la consulta
                $resultado = $conn->query($consulta);

                if ($resultado->num_rows > 0) {
                    // Recorre los resultados y muestra los datos en la tabla
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row['claveId'] . "</td>
                        <td>" . $row['descripcion'] . "</td>
                        <td>" . $row['linea'] . "</td>
                        <td>" . $row['unidadEntrada'] . "</td>
                        <td>" . $row['unidadSalida'] . "</td>
                        <td>" . $row['claveUnidad'] . "</td>
                        <td>" . $row['codigoProveedor'] . "</td>
                        <td>" . $row['claveAlterna'] . "</td>
                        <td>" . $row['numeroFabricante'] . "</td>
                        <td>" . $row['controlAlmacen'] . "</td>
                        <td>" . $row['estatus'] . "</td>
                        <td>" . $row['existencias'] . "</td>
                        <td>" . $row['factorUnidades'] . "</td>
                        <td>" . $row['conteo'] . "</td>
                        <td>" . $row['contado'] . "</td>
                        <td>" . $row['fabricante'] . "</td>
                        <td>" . $row['marca'] . "</td>
                        <td>" . $row['claveSat'] . "</td>
                        <td>" . $row['existe'] . "</td>
                        <td>" . $row['paraRevision'] . "</td>
                        <td>" . $row['paraReestructura'] . "</td>
                        <td>" . $row['fechaMov'] . "</td>
                      </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>