<?php

require_once("Produto.php");
require_once("Comida.php");
require_once("Bebida.php");
require_once("IPedido.php");

class Pedido implements IPedido {
    // Atributos
    private string $nomeCliente;
    private string $nomeGarcom;
    private string $nomeCaixeiro;
    private array $produtos = [];  

    private static array $pedidos = []; 

    public function adicionarProduto(Produto $produto): void {
        $this->produtos[] = $produto;
    }

    public function listarProdutosPedido(): void {
        if (empty($this->produtos)) {
            echo "Nenhum produto no pedido.\n";
        } else {
            $total = 0;
            echo "=== Pedido ===\n";
            foreach ($this->produtos as $produto) {
                echo "ID: {$produto->getId()} - Nome: {$produto->getNome()} - Valor: R$ " . number_format($produto->getValor(), 2, ',', '.') . "\n";
                $total += $produto->getValor();
            }
            echo "Total do Pedido: R$ " . number_format($total, 2, ',', '.') . "\n";
        }
    }

    public function adicionarPedido(Pedido $pedido): void {
        self::$pedidos[] = $pedido;
    }

    public function calcularTotal(): float {
        $total = 0;
        foreach ($this->produtos as $produto) {
            $total += $produto->getValor();
        }
        return $total;
    }

    public function menu(): array {
        
            return [
            new Bebida(1, "Espresso", 8.00, 50),
            new Bebida(2, "Cappuccino", 6.00, 150),
            new Bebida(3, "Latte", 4.00, 200),
            new Bebida(4, "Mocha", 6.00, 200),
            new Bebida(8, "Macchiato", 7.00, 100),
            new Bebida(9, "Frappuccino", 10.00, 300),
            new Bebida(10, "Chá Verde", 5.00, 250),
            new Bebida(11, "Água com Gás",  3.50, 500),
            new Bebida(12, "Suco de Morango", 6.50, 250),
            new Bebida(13, "Limonada", 5.50, 300),
            
            new Comida(5, "Bolo de Chocolate", 12.00, "Doce"),
            new Comida(6, "Croissant de Chocolate", 7.00, "Doce"),
            new Comida(7, "Sanduíche de Presunto e Queijo", 14.00, "Salgada"),
            new Comida(14, "Torrada com Avocado", 15.00, "Salgada"),
            new Comida(15, "Donuts", 8.00, "Doce"),
            new Comida(16, "Pastel de Belém", 9.00, "Doce"),
            new Comida(17, "Quiche Lorraine", 18.00, "Salgada"),
            new Comida(18, "Coxinha", 5.00, "Salgada"),
            new Comida(19, "Salada de Frutas", 12.00, "Doce"),
            new Comida(20, "Wrap de Frango", 16.00, "Salgada"),
            
        ];
    }

    public function __toString(): string {
        return "Cliente: {$this->getNomeCliente()}, Garçom: {$this->getNomeGarcom()}, Caixeiro: {$this->getNomeCaixeiro()}, Total do Pedido: R$ " . number_format($this->calcularTotal(), 2, ',', '.') . "\n";
    }

    // Getters e Setters
    public function getNomeCliente(): string {
        return $this->nomeCliente;
    }

    public function setNomeCliente(string $nomeCliente): self {
        $this->nomeCliente = $nomeCliente;
        return $this;
    }

    public function getNomeGarcom(): string {
        return $this->nomeGarcom;
    }

    public function setNomeGarcom(string $nomeGarcom): self {
        $this->nomeGarcom = $nomeGarcom;
        return $this;
    }

    public function getNomeCaixeiro(): string {
        return $this->nomeCaixeiro;
    }

    public function setNomeCaixeiro(string $nomeCaixeiro): self {
        $this->nomeCaixeiro = $nomeCaixeiro;
        return $this;
    }
}
