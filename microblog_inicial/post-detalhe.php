<?php 
require "inc/funcoes-posts.php";
require "inc/cabecalho.php"; 
$id = $_GET['id'];
$post = lerDetalhes($conexao, $id);

/* Criando um cookie para registrar se um post já foi acessado */
/* No php . é usado para concatenar */
/* strtotime é o tempo que o cookie fica no navegador */
setcookie("post_".$id, "já lido", strtotime("+15 day"));
?>    
	<div class="row"> <!-- INÍCIO ROW -->

		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2><?=$post['titulo']?></h2>
			<div class="d-flex justify-content-between">
				<p class="font-weight-light">
					<time>
						<?=formataData($post['data'])?>
					</time> - <span><?=$post['autor']?></span>
				</p>
				<!-- Verificando se o cookie post_1, post_2, post_3... existe -->
				<?php if(isset($_COOKIE["post_".$id])){ ?>
				<p>
				<!-- Então mostre o texto abaixo -->
					<span class="badge badge-secondary p-2">já lido</span>
				</p>
				<?php } ?>
			</div>

			<img src="imagens/<?=$post['imagem']?>" alt="Imagem de destaque do post" class="float-left pr-2 img-fluid">
			<!-- nl2br() é uma função que faz um espaçamento entre parágrafos
			nl2br - new line to break -->
			<p><?=nl2br($post['texto'])?></p>
		</article>

	</div> <!-- FIM ROW -->

<?php 
require "inc/rodape.php"; 
?> 