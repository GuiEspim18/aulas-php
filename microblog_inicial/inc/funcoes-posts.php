<?php
require "conecta.php";

/* Usada em post-insere.php */
function inserePost($conexao, $titulo, $texto, $resumo, $imagem, $idUsuarioLogado){
    $sql = "INSERT INTO posts(titulo, texto, resumo, imagem, usuario_id) VALUES('$titulo', '$texto', '$resumo', '$imagem', $idUsuarioLogado)";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim inserePost



/* Usada em post-atualiza.php */
function listaUmPost($conexao, $idUsuarioLogado, $tipoUsuarioLogado, $idPost){    
    if($tipoUsuarioLogado == 'admin'){
        // ADMIN: pode carregar os dados de qualquer post de qualquer usuário
        $sql = "SELECT * FROM posts WHERE id = $idPost";
    }else{
        // EDITOR: pode carregar os dados somente dos seus próprios posts        
        $sql = "SELECT * FROM posts WHERE id = $idPost AND usuario_id = $idUsuarioLogado";
    }


	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim listaUmPost



/* Usada em post-atualiza.php */
function atualizaPost($conexao, $idUsuarioLogado, $tipoUsuarioLogado, $idPost, $titulo, $texto, $resumo, $imagem){
    if($tipoUsuarioLogado == 'admin'){
        // ADMIN: update em post de qaulquer usuário
        $sql = "UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem='$imagem' WHERE id = '$idPost'";
    }else{
        // EDITOR: upgrade somente em seu próprio post 
        $sql = "UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem='$imagem' WHERE id = '$idPost' AND usuario_id = $idUsuarioLogado";
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));       
} // fim atualizaPost



/* Usada em post-exclui.php */
function excluiPost($conexao, $idUsuarioLogado, $tipoUsuarioLogado, $idPost){
    if($tipoUsuarioLogado == 'admin'){
        // ADMIN: pode excluir post de qualquer usuário
        $sql = "DELETE FROM posts WHERE id=$idPost";
    }else{
        // EDITOR: pode excluir apenas post dele mesmo
        $sql = "DELETE FROM posts WHERE id=$idPost AND usuario_id=$idUsuarioLogado";
    }
	mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim excluiPost



/* Usada em posts.php */
function listaPosts($conexao, $idUsuarioLogado, $tipoUsuarioLogado){
    if($tipoUsuarioLogado == 'admin'){
        // SQL do ADMIN: Traz tudo de todos em relação à posts
        $sql = "SELECT posts.id, posts.titulo, posts.data, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id ORDER BY data DESC";
    }else{
        //  SQL do Editor: traz tudo apenas do editor em relação à posts
        $sql = "SELECT * FROM posts WHERE usuario_id = $idUsuarioLogado ORDER BY data DESC";
    }

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    $posts = [];
    while($post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }
    return $posts;
} // fim listaPosts



/* Usada em post-insere.php e post-atualiza.php */
function upload($arquivo){
    $tiposValidos = [
        "image/png","image/jpeg", "image/gif", "image/svg+xml"
    ];

    if( !in_array($arquivo["type"], $tiposValidos) ){
        die("<script>alert('Formato inválido. Tente novamente.');history.back();</script>");
    }

    $nome = $arquivo["name"]; 
    $temp = $arquivo["tmp_name"];

    $destino = "../imagens/".$nome;

    if(move_uploaded_file($temp, $destino)){
        // Se foi feito o upload certo ele retorna verdadeiro
        return true;
    }
} // fim upload

/* Usada em posts.php e páginas da área pública */
function formataData($data){
    // Date já é uma função do php
    // dia / mes / ano   Horas e minutos
    // strtotime vai formatar de string para horas
    return date("d/m/Y H:i", strtotime($data));
}


/*** Funções para a área PÚBLICA do site ***/

/* Usada em index.php */
function lerTodosOsPosts($conexao){
    $sql = "SELECT id, data, titulo, resumo, imagem FROM posts ORDER BY data DESC";
    // DESC -> ordem decrescente, do mais novo ao mais antigo
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim lerTodosOsPosts



/* Usada em post-detalhe.php */
function lerDetalhes($conexao, $id){    
    /* Selecionei todos os campos da tabela posts e só o nome da tabela usuarios e dei a ele um apelido de autor, e se posts eu dei o inner join do usuarios dentro da coluna usuario_id dentro de posts equivalendo ao id da tabela usuarios onde o id da tabela posts é igual ao id passado na url*/
    $sql = "SELECT posts.*, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim lerDetalhes



/* Usada em search.php */
function busca($conexao, $termo){
    /* O % significa que pode ser qualquer termo tenha qualquer coisa após ou antes ele. */
    $sql = "SELECT * FROM posts WHERE titulo LIKE '%$termo%' OR texto LIKE '%$termo%' OR resumo LIKE '%$termo%' ORDER BY data DESC";
        
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim busca