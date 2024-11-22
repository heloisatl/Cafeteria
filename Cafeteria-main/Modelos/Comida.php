<?php

require_once("Produto.php");

class Comida extends Produto {
    private string $tipo; 

    public function __construct(int $id, string $nome, float $valor, string $tipo) {
        parent::__construct($id, $nome, $valor);
        $this->tipo = $tipo;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self {
        $this->tipo = $tipo;
        return $this;
    }
}
