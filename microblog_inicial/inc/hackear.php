<?php
require "conecta.php";
$sql = "SHOW DATABASES";
$resultado = mysqli_query($conexao, $sql);
echo $resultado;