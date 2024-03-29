<?php 
require "../inc/funcoes-usuarios.php"; 
require "../inc/cabecalho-admin.php"; 

if($_SESSION['tipo'] != 'admin' ){
	header("location:nao-autorizado.php");
	exit;
}

$usuarios = lerUsuarios($conexao);
$quantidade = count($usuarios); //cout() ou sizeof() pega quantos elementos tem no array
/* echo "<pre>";
var_dump($usuarios);
echo "</pre>"; */

?>
  <div class="row">
  	<article class="col-12 bg-white rounded shadow my-1 py-4">

  		<h2 class="text-center">
  			Usuários <span class="badge badge-primary"><?=$quantidade?></span>
  		</h2>

  		<p class="lead text-right">
  			<a class="btn btn-primary" href="usuario-insere.php">Inserir novo usuário</a>
  		</p>

  		<div class="table-responsive">

  			<table class="table table-hover">
  				<thead class="thead-light">
  					<tr>
  						<th>Nome</th>
  						<th>E-mail</th>
  						<th>Tipo</th>
  						<th colspan="2" class="text-center">Operações</th>
  					</tr>
  				</thead>

  				<tbody>
<?php foreach($usuarios as $usuario) { ?>
  					<tr>
  						<td> <?=$usuario['nome']?> </td>
  						<td> <?=$usuario['email']?> </td>
  						<td> <?=$usuario['tipo']?> </td>
  						<td class="text-center">
  							<a href="usuario-atualiza.php?id=<?=$usuario['id']?>" class="btn btn-warning btn-sm">
  								Atualizar
  							</a>
  						</td>
  						<td class="text-center">
  							<a href="usuario-exclui.php?id=<?=$usuario['id']?>" class="btn btn-danger btn-sm excluir">
  								Excluir
  							</a>
  						</td>
  					</tr>
<?php } ?>
  				</tbody>
  			</table>
  		</div>

  	</article>
  </div>

<?php require "../inc/rodape-admin.php"; ?> 