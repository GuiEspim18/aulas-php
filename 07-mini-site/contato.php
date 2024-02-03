<!-- Peguei todo o doctype até a abertura da tag main e coloquei ele no cabecalho.php -->
<?php require "inc/cabecalho.php"; ?>
<h2>Fale conosco</h2>
<form action="" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome"><input type="submit" value="submit">
    <label for="email">Email</label>
    <input type="text" name="email" id="email"><input type="submit" value="submit">
</form>
<?php require "inc/rodape.php"; ?>
<!-- Peguei todo o fechamento do main até o fechamento da tag html e coloquei ele no rodape.php -->   