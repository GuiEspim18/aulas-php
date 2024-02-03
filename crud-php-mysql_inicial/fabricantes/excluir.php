<?php
// Somemnte programação php
require "../includes/funcoes-fabricantes.php";
$id = $_GET['id'];
excluirFabricante($conexao, $id);
header("location:listar.php");