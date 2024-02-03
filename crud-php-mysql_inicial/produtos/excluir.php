<?php
require "../includes/funcoes-produtos.php";
$id = $_GET['id'];
excluirProdutos($conexao, $id);
header("location:listar.php");