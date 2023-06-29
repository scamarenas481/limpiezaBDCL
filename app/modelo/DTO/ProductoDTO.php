<?php
class ProductoDTO {
  private $claveID;
  private $descripcion;
  private $linea;
  private $existencias;
  private $unidadDeEntrada;
  private $factorEntreUnidades;
  private $claveSAT;
  private $claveUnidad;
  private $codigoProveedor;
  private $proveedor;
  private $claveAlterna;
  private $existe;
  private $paraRevision;
  private $paraEstructura;
  private $fechaMov;

  public function __construct($claveID, $descripcion, $linea, $existencias, $unidadDeEntrada, $factorEntreUnidades, $claveSAT, $claveUnidad, $codigoProveedor, $proveedor, $claveAlterna, $existe, $paraRevision, $paraEstructura, $fechaMov) {
    $this->claveID = $claveID;
    $this->descripcion = $descripcion;
    $this->linea = $linea;
    $this->existencias = $existencias;
    $this->unidadDeEntrada = $unidadDeEntrada;
    $this->factorEntreUnidades = $factorEntreUnidades;
    $this->claveSAT = $claveSAT;
    $this->claveUnidad = $claveUnidad;
    $this->codigoProveedor = $codigoProveedor;
    $this->proveedor = $proveedor;
    $this->claveAlterna = $claveAlterna;
    $this->existe = $existe;
    $this->paraRevision = $paraRevision;
    $this->paraEstructura = $paraEstructura;
    $this->fechaMov = $fechaMov;
  }

  public function getClaveID() {
    return $this->claveID;
  }

  public function setClaveID($claveID) {
    $this->claveID = $claveID;
  }

  public function getDescripcion() {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  public function getLinea() {
    return $this->linea;
  }

  public function setLinea($linea) {
    $this->linea = $linea;
  }

  public function getExistencias() {
    return $this->existencias;
  }

  public function setExistencias($existencias) {
    $this->existencias = $existencias;
  }

  public function getUnidadDeEntrada() {
    return $this->unidadDeEntrada;
  }

  public function setUnidadDeEntrada($unidadDeEntrada) {
    $this->unidadDeEntrada = $unidadDeEntrada;
  }

  public function getFactorEntreUnidades() {
    return $this->factorEntreUnidades;
  }

  public function setFactorEntreUnidades($factorEntreUnidades) {
    $this->factorEntreUnidades = $factorEntreUnidades;
  }

  public function getClaveSAT() {
    return $this->claveSAT;
  }

  public function setClaveSAT($claveSAT) {
    $this->claveSAT = $claveSAT;
  }

  public function getClaveUnidad() {
    return $this->claveUnidad;
  }

  public function setClaveUnidad($claveUnidad) {
    $this->claveUnidad = $claveUnidad;
  }

  public function getCodigoProveedor() {
    return $this->codigoProveedor;
  }

  public function setCodigoProveedor($codigoProveedor) {
    $this->codigoProveedor = $codigoProveedor;
  }

  public function getProveedor() {
    return $this->proveedor;
  }

  public function setProveedor($proveedor) {
    $this->proveedor = $proveedor;
  }

  public function getClaveAlterna() {
    return $this->claveAlterna;
  }

  public function setClaveAlterna($claveAlterna) {
    $this->claveAlterna = $claveAlterna;
  }

  public function getExiste() {
    return $this->existe;
  }

  public function setExiste($existe) {
    $this->existe = $existe;
  }

  public function getParaRevision() {
    return $this->paraRevision;
  }

  public function setParaRevision($paraRevision) {
    $this->paraRevision = $paraRevision;
  }

  public function getParaEstructura() {
    return $this->paraEstructura;
  }

  public function setParaEstructura($paraEstructura) {
    $this->paraEstructura = $paraEstructura;
  }

  public function getFechaMov() {
    return $this->fechaMov;
  }

  public function setFechaMov($fechaMov) {
    $this->fechaMov = $fechaMov;
  }
}
?>