<?php 
require "../inc/funcoes-posts.php";
require "../inc/cabecalho-admin.php"; 

$posts = listaPosts($conexao, $_SESSION['id'], $_SESSION['tipo']);
/* echo "<pre>";
var_dump($posts);
echo "</pre>"; */
// length do posts
$quantidade = count($posts);
?>      
    
	<div class="row">
		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2 class="text-center">Posts <span class="badge badge-primary"><?=$quantidade?></span></h2>
			<p class="lead text-right">
				<a class="btn btn-primary" href="post-insere.php">Inserir novo post</a>
			</p>

			<div class="table-responsive">

				<table class="table table-hover">
					<thead class="thead-light">
						<tr>
							<th>Título</th>
							<th>Data</th>
							<?php if($_SESSION['tipo']=='admin'){ ?>
							<th>Autor</th>
							<?php } ?>
							<th colspan="2" class="text-center">Operações</th>
						</tr>
					</thead>

					<tbody>
					<?php foreach($posts as $post){ ?>
						<tr>
							<td> <?=$post['titulo']?> </td>
							<td> <?=formataData($post['data'])?> </td>
							<?php if($_SESSION['tipo'] == 'admin' ){ ?>
							<td> <?=$post['autor']?> </td>
							<?php } ?>
							<td class="text-center">
								<a href="post-atualiza.php?id=<?=$post['id']?>" class="btn btn-warning btn-sm">
									Atualizar
								</a>
							</td>
							<td class="text-center">
								<a href="post-exclui.php?id=<?=$post['id']?>" class="btn btn-danger btn-sm excluir">
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