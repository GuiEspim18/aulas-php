<?php
require "conecta.php";
function insereUsuario($conexao, $nome, $email, $senha, $tipo){
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo)VALUES('$nome', '$email', '$senha', '$tipo')";
    mysqli_query($conexao, $sql)or die(mysqli_error($conexao));
}

function codificaSenha($senha){
    // criptografando senha
    // Pega a senha e criptografa
    return password_hash($senha, PASSWORD_BCRYPT);
}

// Usada em usuários.php
function lerUsuarios($conexao){
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $usuarios=[];
    // while cria o array associativo com o resultados dentro dele
    // e após isso ele joga dentro do usuarios
    while($usuario = mysqli_fetch_assoc($resultado)){
        array_push($usuarios, $usuario);
    }
    return $usuarios;
    // Vai retornar o array com todos os usuários apartir do array
}// fim lerUsuarios

// Usada em usuario-exclui.php
function excluiUsuario($conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

// Usada no usuario-atualiza.php 
function verificaSenha($senhaDigitadaNoFormulario, $senhaExistenteNoBD){
    if(password_verify($senhaDigitadaNoFormulario, $senhaExistenteNoBD)){
        /* Se as senhas forem iguais */
        return $senhaExistenteNoBD;
        /* Retorne a senha existente no banco de dados */
    }else{
        return codificaSenha($senhaDigitadaNoFormulario);
        /* Senão criptografe a nova senha */
    }
}

//  Usada em usuario-atualiza.php
function lerUmUsuario($conexao, $id){
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
}

// Usada em usuario-atualiza.php 
function atualizaUsuario($conexao, $id, $nome, $email, $senha, $tipo){
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$tipo' WHERE id= $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

// Usada em login.php 
function buscaUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
}