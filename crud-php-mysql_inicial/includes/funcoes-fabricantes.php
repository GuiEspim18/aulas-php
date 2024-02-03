<?php
// founcoes-fabricantes.php
// As conecções estão no conecta.php então estamos carregando os dados/acesso ao serviço
require "conecta.php";
// Posso usar a $conexao pois eu carreguei oconecta.php

/* Usada na página fabricantes/lista.php */
function lerFabricantes($conexao){
    //  1) Montar a string do comando SQL
    $sql = "SELECT * FROM fabricantes ORDER BY nome";
    // 2) Executar o comando
    // Função para executar no banco de dados
    // Se der o falso ele interrompe a página e mostra os detalhes do erro
    // Die só é usado na fase de desenvolvimento
    $resultados = mysqli_query($conexao, $sql) or die(msqli_error($conexao));
    // 3) Criar um array vazio para receber os resultados
    $fabricantes = [];
    //  4)
    // Enquanto ouver resultados na minha busca por dados na tabela fabricantes do banco de dados
    // ele vai criar uma variável e vai trazer para dentro da variável que é um array os valores do banco de dados
    // mysqli_fetch_assoc vai criar um array associativo
    // array_push($fabricantes, $fabricante);
    // Vai pegar o array associativo represenatdo por fabricante e colocar ele dentro do array fabricantes
    while($fabricante = mysqli_fetch_assoc($resultados)){
        array_push($fabricantes, $fabricante);
    }
    // 5) Retornando para fora da funçaõ o array já pronto
    return $fabricantes;
} /* Fim função lerFabricantes */

// Vamos passar a conexão
/* Usada na página fabricantes/inserir.php */
function inserirFabricante($conexao, $nome){
    // Criei a variável nome para guardar o valor que está dentro do imput para inserir fabricante
    $sql = "INSERT INTO fabricantes(nome) VALUES('$nome')";
    // Execultando o comando sql no servidor e verificando por erro:
    mysqli_query($conexao, $sql) or die(mysqli_query($conexao, $sql));
    // Php precisa saber o name do elemento html para entender quem é ele
} /* fim função inserirFabricantes */

/* Usada na página fabricantes/atualizar.php */
/* Função exclusiva para carregar os dados de um fabricante */
function lerUmFabricante($conexao, $id){
    // Trazer o dado da tabela fabricantes onde o id é igual ao id informado
    $sql = "SELECT * FROM fabricantes WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_query($conexao, $sql));
    // Retornamos para fora da função 1 array associativo contendo os dados
    return mysqli_fetch_assoc($resultado);
}

/* Usada na página fabricantes/atualizar.php */
/* Função exclusiva para permitir ATUALIZAR os dados de UM FABRICANTE */
function atualizarFabricante($conexao, $id, $nome){
    $sql = "UPDATE fabricantes SET nome = '$nome' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

// Usada na página fabricantes/excluir.php
function excluirFabricante($conexao, $id){
    $sql = "DELETE FROM fabricantes WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_query($conexao));
}