<?php
function insertarRegistrosPrueba() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "casalupita";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $registros = 200;
    $fechaInicio = "2021-01-01";
    

    $stmt = $conn->prepare("INSERT INTO `productos` (`claveId`, `descripcion`, `linea`, `unidadEntrada`, `unidadSalida`, `claveUnidad`, `codigoProveedor`, `claveAlterna`, `numeroFabricante`, `controlAlmacen`, `estatus`, `existencias`, `factorUnidades`, `conteo`, `contado`, `fabricanteId`, `marcaId`, `claveSat`, `existe`, `paraRevision`, `paraReestructura`, `fechaMov`, `IdUsuario`, `IdUsuarioAsig`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssssdiiiiiiiiisii", $claveId, $descripcion, $linea, $unidadEntrada, $unidadSalida, $claveUnidad, $codigoProveedor, $claveAlterna, $numeroFabricante, $controlAlmacen, $estatus, $existencias, $factorUnidades, $conteo, $contado, $fabricanteId, $marcaId, $claveSat, $existe, $paraRevision, $paraReestructura, $fechaMov, $idUsuario, $idUsuarioAsig);

    for ($i = 1; $i <= $registros; $i++) {
        $numeroAleatorio1 = rand(3, 4);
        $numeroAleatorio2 = rand(1, 2);
        $numeroAleatorio3 = rand(1, 2);
        $idUsuario = $numeroAleatorio1;
        $fabricanteId = $numeroAleatorio2;
        $marcaId = $numeroAleatorio3 ;
        $claveId = "clave" . $i;
        $descripcion = "Descripción " . $i;
        $linea = "Linea " . $i;
        $unidadEntrada = "Unidad Entrada " . $i;
        $unidadSalida = "Unidad Salida " . $i;
        $claveUnidad = "Clave Unidad " . $i;
        $codigoProveedor = "Código Proveedor " . $i;
        $claveAlterna = "Clave Alterna " . $i;
        $numeroFabricante = "Número Fabricante " . $i;
        $controlAlmacen = "Control Almacen " . $i;
        $estatus = "E";
        $existencias = $i * 10.5;
        $factorUnidades = $i;
        $conteo = rand(0, 100);
        $contado = rand(0, 1);
        $claveSat = $i;
        $existe = rand(0, 1);
        $paraRevision = rand(0, 1);
        $paraReestructura = rand(0, 1);
        $fechaMov = date('Y-m-d', strtotime($fechaInicio . " + " . $i . " days"));
        $idUsuarioAsig = NULL;

        if (!$stmt->execute()) {
            echo "Error al insertar registros: " . $stmt->error;
            break;
        }
    }

    echo "Registros insertados correctamente.";

    $stmt->close();
    $conn->close();
}

// Llama a la función para insertar los registros de prueba
insertarRegistrosPrueba();
?>
