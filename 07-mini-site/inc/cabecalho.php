<?php
// Vou programar algo para detectar a página que eu estou e assim mudar o fundo da página
// Base name vai me trazer o nome de um recurso
// Estou recuperando os dados referente ao nome e extenção da página aberta apartir do servidor
$pagina = basename($_SERVER["PHP_SELF"]);
switch ($pagina) {
    case 'index.php':
        $titulo = "Home";
        break;
    case 'produtos.php':
        $titulo = "produtos";
        break;
    case 'serviços.php':
        $titulo = "Serviços";
        break;
    default:
        $titulo = "Contato";
        break;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site ABC - <?=$titulo?></title>
</head>
<body>
    <header>
        <h1> 👻ABC Tecnologia</h1>
        <nav>
            <a href="index.php" title="home">Home</a>
            <a href="produtos.php" title="produtos">Produtos</a>
            <a href="servicos.php" title="serviços">Serviços</a>
            <a href="contato.php" title="contato">Contato</a>
        </nav>
    </header>
    <hr>
    <main>