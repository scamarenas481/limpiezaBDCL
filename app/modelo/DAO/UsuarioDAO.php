<?php
class UsuarioDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validarCredenciales($username, $password) {
        $sql = "SELECT * FROM usuarios WHERE Usuario = ? AND Password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return ($result->num_rows === 1);
    }
}
?>
