<?php
require_once __DIR__.'/../config/ConexionController.php';
require_once __DIR__.'/../modelo/DTO/UsuarioDTO.php';

class UsuarioDAO
{
    private $conexion;

    public function __construct()
    {
        $conexionController = new ConexionController();
        $this->conexion = $conexionController->obtenerConexion();
    }

    public function obtenerUsuarios()
    {
        try {
            $query = "SELECT * FROM usuarios";
            $stmt = $this->conexion->query($query);
            $usuarios = $stmt->fetchAll();
            return $usuarios;
        } catch (PDOException $e) {
            echo 'Error al obtener los usuarios: ' . $e->getMessage();
            return [];
        }
    }

    // Otros métodos para insertar, actualizar, eliminar usuarios, etc.
    public function obtenerUsuarioPorNombre($nombre)
    {
        $usuarioDTO = null;
        $statement = null;
        $resultSet = null;

        try {
            $query = "SELECT * FROM usuarios WHERE Usuario = ?";
            $statement = $this->conexion->prepare($query);
            $statement->bindParam(1, $nombre);
            $statement->execute();

            if ($row = $statement->fetch()) {
                $id = $row['id'];
                $username = $row['Usuario'];
                $password = $row['Password'];

                $usuarioDTO = new UsuarioDTO($id, $username, $password);
            }
        } catch (PDOException $e) {
            echo "Error al obtener usuario por nombre: " . $e->getMessage();
        } finally {
            if ($resultSet != null) {
                $resultSet->closeCursor();
            }
            if ($statement != null) {
                $statement->closeCursor();
            }
        }

        return $usuarioDTO;
    }
}
?>
