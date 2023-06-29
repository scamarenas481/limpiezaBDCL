<?php
require_once __DIR__.'/../modelo/DTO/UsuarioDTO.php';
require_once __DIR__.'/../modelo/DAO/UsuarioDAO.php';

class UsuarioController {
    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function validarCredenciales($usuario, $contrasena) {
        try {
            $usuarioDTO = $this->usuarioDAO->obtenerUsuarioPorNombre($usuario);
            if ($usuarioDTO != null && $usuarioDTO->getPassword() == $contrasena) {
                return true;
            }
        } catch (Exception $e) {
            echo "Usuario nullo";
        }
        return false;
    }
}
?>
