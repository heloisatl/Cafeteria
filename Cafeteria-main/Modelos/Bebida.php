<?php
require_once("Produto.php");

class Bebida extends Produto {
    private $volume;

    public function __construct($id, $nome, $valor, $volume) {
        parent::__construct($id, $nome, $valor);
        $this->volume = $volume;
    }

    public function getVolume() {
        return $this->volume;
    }
}
