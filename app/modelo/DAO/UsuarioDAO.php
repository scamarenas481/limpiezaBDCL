<?php
class UsuarioDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getHashedPassword($username) {
        $hashedPassword = '';
        $query = "SELECT hashedPassword FROM usuarios WHERE Usuario = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->bind_result($hashedPassword);
        $statement->fetch();
        $statement->close();

        return $hashedPassword;
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
