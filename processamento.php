<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <h1>Processamento de dados de formulário usando PHP.</h1>
    <hr>
    <?php

        if(empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["mensagens"])){
            ?>
                <p style="color:red;">Todos os campos devem ser preenchidos!</p>
            <?php
        }else{
            /* Capturando dados do formulário usando o array super global $_POST */
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $mensagem = $_POST["mensagem"];
            ?>
            <h2>Dados recebidos:</h2>
            <p><?=$nome?> - <?=$email?> - <?=$mensagem?></p>
            <?php
        }
    ?>
</body>
</html>