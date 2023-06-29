<?php
require_once __DIR__.'app/controlador/ConexionController.php';

class ProductoDAO
{
    private $conexion;

    public function __construct()
    {
        $conexionController = new ConexionController();
        $this->conexion = $conexionController->obtenerConexion();
    }

    public function obtenerProductos()
    {
        try {
            $query = "SELECT * FROM productos";
            $stmt = $this->conexion->query($query);
            $productos = $stmt->fetchAll();
            return $productos;
        } catch (PDOException $e) {
            echo 'Error al obtener los productos: ' . $e->getMessage();
            return [];
        }
    }

    // Otros métodos para insertar, actualizar, eliminar productos, etc.
}
?>
