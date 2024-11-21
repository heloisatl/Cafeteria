<?php

require_once("Modelos/Produto.php");
require_once("Modelos/Comida.php");
require_once("Modelos/Bebida.php");
require_once("Modelos/Pedido.php");

$pedido = new Pedido();

// Funções
function listarMenu($pedido) {
    $menu = $pedido->menu();  
    echo "=== Menu de Produtos ===\n";
    echo "\n=== Bebidas ===\n";
    foreach ($menu as $produto) {
        if ($produto instanceof Bebida) {
            echo "ID: {$produto->getId()} - Nome: {$produto->getNome()} - Valor: R$ " . number_format($produto->getValor(), 2, ',', '.') . " - Volume: {$produto->getVolume()}ml\n";
        }
    }

    echo "\n=== Comidas ===\n"; 
    foreach ($menu as $produto) {
        if ($produto instanceof Comida) {
            echo "ID: {$produto->getId()} - Nome: {$produto->getNome()} - Valor: R$ " . number_format($produto->getValor(), 2, ',', '.') . " - Tipo: {$produto->getTipo()}\n";
        }
    }
}

function adicionarProdutoAoPedido($pedido) {
    echo "Digite o ID do produto para adicionar ao pedido: ";
    $idProduto = (int)readline();

    $menu = $pedido->menu();
    $produto = null;

    foreach ($menu as $p) {
        if ($p->getId() === $idProduto) {
            $produto = $p;
            break;
        }
    }

    if ($produto) {
        $pedido->adicionarProduto($produto);  
        echo "Produto {$produto->getNome()} adicionado ao pedido com sucesso!\n";
    } else {
        echo "Produto não encontrado!\n";
    }
}

function calcularTotalPedido($pedido) {
    echo "Digite o nome do cliente: ";
    $nomeCliente = readline();
    echo "Digite o nome do garçom: ";
    $nomeGarcom = readline();
    echo "Digite o nome do caixeiro: ";
    $nomeCaixeiro = readline();

    $pedido->setNomeCliente($nomeCliente);
    $pedido->setNomeGarcom($nomeGarcom);
    $pedido->setNomeCaixeiro($nomeCaixeiro);

    echo "=== Resumo do Pedido ===\n";
    $pedido->listarProdutosPedido();
}

do {
    echo "\n\n\n=============================\n";
    echo "     MENU PRINCIPAL\n";
    echo "=============================\n";
    echo "1. Adicionar Produto ao Pedido\n";
    echo "2. Listar Menu de Produtos\n";
    echo "3. Calcular Total do Pedido\n";
    echo "4. Sair\n";
    echo "=============================\n";
    echo "Escolha uma opção: ";
    
    $opcao = readline();

    switch ($opcao) {
        case 1:
            adicionarProdutoAoPedido($pedido);
            break;
        case 2:
            listarMenu($pedido);  
            break;
        case 3:
            calcularTotalPedido($pedido);
            break;
        case 4:
            echo "Saindo da Cafeteria... Esperamos pela seu retorno!\n";
            break;
        default:
            echo "Opção inválida. Tente novamente.\n";
    }
} while ($opcao != 4);
