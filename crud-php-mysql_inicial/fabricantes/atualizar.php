<?php
require "../includes/funcoes-fabricantes.php";
// Em listar eu programei o envio do id para a url, preciso agora programar o recebimento
// Obtendo o valor do id através da URL:
$id = $_GET['id'];
// Chamando a função lerUmFbricante
$fabricante = lerUmFabricante($conexao, $id);
/* Detectar quando o formulário de atualização é acionado */
if(isset($_POST["atualizar"])){
    $nome = $_POST['nome'];
    atualizarFabricante($conexao, $id, $nome);
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | UPDATE - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <h1>UPDATE - CRUD com PHP e MySQL - <a href="../index.php">Home</a></h1>
    <hr>
    
    <p>Utilize o formulário abaixo para atualizar os dados de <b>um fabricante</b>.</p>

    <form action="#" method="post">
    <!-- Campo oculto -->
    <!-- Trazer uma consistência maior para o meu formulário -->
    <input type="hidden" name="id" value="<?=$fabricante['id']?>">
	    <p>
            <label for="nome">Nome:</label><br>
            <!-- Acrescentei no input o nome -->
	        <input type="text" name="nome" id="nome" value="<?=$fabricante['nome']?>" required>
        </p>   
        <button name="atualizar">Atualizar fabricante</button>
	</form>	

   
    <hr>
    <p><a href="listar.php">Voltar à lista de fabricantes</a></p>


</div>

</body>
</html>