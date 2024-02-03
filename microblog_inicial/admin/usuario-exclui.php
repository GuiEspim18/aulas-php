<?php 
require "../inc/funcoes-sessao.php";
require "../inc/funcoes-usuarios.php";

verificaAcesso();

if($_SESSION['tipo'] != 'admin' ){
	header("location:nao-autorizado.php");
	exit;
}

// pegando o id que vem da url
$id = $_GET['id'];
excluiUsuario($conexao, $id);
header("location:usuarios.php");
