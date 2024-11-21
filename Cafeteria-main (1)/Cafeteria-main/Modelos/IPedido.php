<?php

interface IPedido {
    public function adicionarProduto(Produto $produto): void;
    public function listarProdutosPedido(): void;
    public function calcularTotal(): float;
    public function adicionarPedido(Pedido $pedido): void;
}
