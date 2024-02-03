<?php 
// para poder inserir um fabricante o php precisa saber quando o botão foi clicado
if(isset($_POST['inserir'])){
    // importanto as funções
    require "../includes/funcoes-fabricantes.php";
    // obtendo o nome digitado no formulário
    $nome = $_POST['nome'];
    // Chamando a função inserirFabricante
    inserirFabricante($conexao, $nome);
    // redirecionamento para a página de visualização
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | INSERT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <h1>INSERT - CRUD com PHP e MySQL - <a href="../index.php">Home</a></h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um <b>fabricante</b>.</p>
    
	<form action="" method="post">
	    <p>
            <label for="nome">Nome:</label><br>
	        <input type="text" name="nome" id="nome" required>
        </p>	    
        <button name="inserir">Inserir fabricante</button>
	</form>	

	<hr>
    <p><a href="../index.php">Voltar ao início</a></p>


</div>

</body>
</html>