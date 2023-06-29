<?php
class ConexionController
{
    private $host = 'localhost';
    private $db = 'casalupita';
    private $usuario = 'root';
    private $contrasena = '';

    public function obtenerConexion()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $conexion = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
            return $conexion;
        } catch (PDOException $e) {
            echo 'Error al establecer la conexión: ' . $e->getMessage();
            return null;
        }
    }
}

// Ejemplo de uso del controlador
$conexionController = new ConexionController();
$conexion = $conexionController->obtenerConexion();

if ($conexion !== null) {
    echo 'Conexión exitosa a la base de datos.';
    // Aquí puedes realizar operaciones adicionales con la conexión
} else {
    echo 'No se pudo establecer la conexión a la base de datos.';
}

// Cerrar la conexión si ya no se necesita
$conexion = null;
?>
