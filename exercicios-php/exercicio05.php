<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercicio 05</title>
<style>
table { 
	border: solid 2px red; 
	border-collapse:collapse;
}
td, th { border: solid 1px blue; }

tr:nth-child(odd) { background-color:#E8FF93; }
</style>
</head>

<body>
<h1> Exercicio 05 (loop e array)</h1>
<hr>

<p>Crie um array com 5 nomes de tecnologias: JavaScript, PHP, HTML5, CSS3 e Bootstrap.</p>
<p>Em seguida, exiba o nome destes cursos em linhas de uma tabela HTML.</p>
<hr>
<?php
$tec=array(
	"JavaScript", "PHP", "HTML5", "CSS3", "Bootstrap"
);
?>

<table>
	<thead>
		<tr>
    		<th>CÓDIGO</th> <!-- Obs.: use o valor do índice do array como código do curso -->
    		<th>CURSO</th>
    	</tr>
	</thead>
    
	<tbody>
		<?php
		$control = 1;
		foreach ($tec as $key) { ?>
			<tr>
				<td><?=$control?></td>
				<td><?=$key?></td>
			</tr>
		<?php
			$control++;
		} ?>
		<!-- apresente as linhas de dados aqui -->

	</tbody>
	
</table>









</body>
</html>