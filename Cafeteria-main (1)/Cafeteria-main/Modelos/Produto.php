<?php
class Produto {
    private $id;
    private $nome;
    private $valor;

    public function __construct($id, $nome, $valor) {
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }
}
