<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário e Processamento (combinados)</title>
</head>
<body>
    <h1>Formulário HTML e Processamento PHP</h1>
    <hr>

<?php
    /*detectando quando o formulário é adicionado/enviado*/
    /* isset = está definido ? */
    /* é como se fosse um monitor de eventos em php, mas ele monitor se o botão existe*/
    /* Enquanto eu não clicar no botão o formulário vai ser exibido */
    if(isset($_POST["enviar"])){
        // No momento que eu clicar nesse botão ele vai retornar verdadeiro
        if(empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["mensagem"])){
           ?>
                <p style="color: red;">Todos os campos são obrigatórios</p>
           <?php
        }else{
            $nome=$_POST["nome"];
            $email=$_POST["email"];
            $mensagem=$_POST["mensagem"];
            ?>
                <ul>
                    <li>Nome: <?=$nome?></li>
                    <li>E-mail: <?=$email?></li>
                    <li>Mensagem: <?=$mensagem?></li>
                </ul>
            <?php
        }
    } else { //aqui adicionamos um else
       ?>
        <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <p>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="mensagem">Mensagem:</label><br>
            <textarea name="mensagem" id="mensagem" cols="30" rows="6"></textarea>
        </p>
        <button name="enviar">Enviar</button>
        </form>
        <?php //aqui após o form adicionamos o fechamento do if/esle isset
    }
    
?>

    
</body>
</html>