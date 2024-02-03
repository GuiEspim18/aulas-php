<?php
/* Sessões no PHP
Recurso usado para o controle de acesso à determinadas áreas  do site (exemplo: áre administrativa, em que i acesso somente serpa possível oara usuários cadastrados e logados no sistema) */
if(!isset($_SESSION)){
    // Iniciando uma sessão
    session_start();
}

// Usada login.php
function login($id, $nome, $email, $tipo){
    //  Variáveis de sessão
    // Assim que logado essas variáveis sempre vão existir
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email']= $email;
    $_SESSION['tipo']= $tipo;
}

// Usa em todas as páginas da área administrativa
function verificaAcesso(){
    // Se não existir uma variável de sessão
    if(!isset($_SESSION['id'])){
        // Se o usuário não estiver logado destrua qualquer restício de sessão e leve-o para o login
        session_destroy();
        header("location:../login.php?acesso_proibido");
        exit;
    }
}

// Usa em todas as páginas da área administrativa
function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    exit;
}