<?php
require "../inc/funcoes-posts.php";
require "../inc/funcoes-sessao.php";

verificaAcesso(); // Proteção, o usuário só consegue chegar aqui se ele estiver logado

$id = $_GET['id']; // id do post vindo da url

excluiPost($conexao, $_SESSION['id'], $_SESSION['tipo'], $id);
header("location:posts.php");



