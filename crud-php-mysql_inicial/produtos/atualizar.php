<?php
require "../includes/funcoes-produtos.php";
require "../includes/funcoes-fabricantes.php";
$fabricantes = lerFabricantes($conexao);
$id = $_GET['id']; //pegando o id apartir da url
$produto = lerUmProduto($conexao, $id);
if(isset($_POST['atualizar'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $fabricante = $_POST['fabricante'];
    atualizarProduto($conexao, $id, $nome, $descricao, $fabricante);
    header('location:listar.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | UPDATE - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <h1>UPDATE - CRUD com PHP e MySQL - <a href="../index.php">Home</a></h1>
    <hr>
    
    <p>Utilize o formulário abaixo para atualizar os dados de <b>um produto</b>.</p>

    <form action="#" method="post">
	    <p><label for="nome">Nome:</label><br>
	    <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required></p>
        
        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
                <option value=""></option>
                <?php foreach($fabricantes as $fabricante){ 
                if($fabricante['id']== $produto['fabricante_id']){
                    // Aplique o atributo selected no option
                    $selecionado = "selected";
                }else{
                    // Senão, não aplique (deixe vazio)
                    $selecionado = "";
                }    
                ?>
                <option <?=$selecionado?> value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
                <?php } ?>
            </select>
        </p>

	    <p>
            <label for="descricao">Descrição:</label><br>
	        <textarea name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required><?=$produto['descricao']?></textarea>
	    </p>
        
        <p>
            <button name="atualizar">Atualizar produto</button>
        </p>
	</form>	   
    <hr>
    <p><a href="listar.php">Voltar à lista de produtos</a></p>


</div>

</body>
</html>