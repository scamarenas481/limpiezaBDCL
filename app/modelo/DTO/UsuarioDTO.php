<?php
class UsuarioDTO {
  private $id;
  private $usuario;
  private $password;

  public function __construct($id, $usuario, $password) {
    $this->id = $id;
    $this->usuario = $usuario;
    $this->password = $password;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }
}
?>