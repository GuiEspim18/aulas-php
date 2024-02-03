<?php
/* Dados para acesso local ao servidor de banco de dados */
$servidor = "localhost";
$usuario = "root"; /* Usuário do servidor xampp */
$senha = ""; /* Senha no caso do xampp */
$banco = "exemplo_progweb";

//Conectando ao servidor/banco
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//Habilitando utf8
mysqli_set_charset($conexao, "utf8");

//  Teste de conexão
/* if($conexao){
    echo "conexão ok!";
} */