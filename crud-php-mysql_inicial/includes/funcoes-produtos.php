<?php
// founcoes-produtos.php
// As conecções estão no conecta.php então estamos carregando os dados/acesso ao serviço
require "conecta.php";
// Posso usar a $conexao pois eu carreguei oconecta.php

/* Usada na página produtos/lista.php */
function lerProdutos($conexao){
    $sql = "SELECT produtos.*, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produtos.nome";
    $resultados = mysqli_query($conexao, $sql) or die(msqli_error($conexao));
    $produtos = [];
    while($produto = mysqli_fetch_assoc($resultados)){
        array_push($produtos, $produto);
    }
    return $produtos;
}

// Vamos passar a conexão
/* Usada na página produtos/inserir.php */
function inserirProduto($conexao, $nome, $descricao, $fabricanteId){
    $sql = "INSERT INTO produtos(nome, descricao, fabricante_id) VALUES('$nome', '$descricao', '$fabricanteId')";
    mysqli_query($conexao, $sql) or die(mysqli_query($conexao, $sql));
}

/* Usada na página produtos/atualizar.php */
/* Função exclusiva para carregar os dados de um produto */
function lerUmProduto($conexao, $id){
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_query($conexao, $sql));
    return mysqli_fetch_assoc($resultado);
}

/* Usada na página produtos/atualizar.php */
/* Função exclusiva para permitir ATUALIZAR os dados de UM PRODUTO */
function atualizarProduto($conexao, $id, $nome, $descricao, $fabricanteId){
    $sql = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', fabricante_id = '$fabricanteId' WHERE id = $id";// atenção prerigo
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

// Usada na página fabricantes/excluir.php
function excluirProdutos($conexao, $id){
    $sql = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_query($conexao));
}