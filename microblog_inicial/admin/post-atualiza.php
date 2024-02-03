<?php
require "../inc/funcoes-posts.php"; 
require "../inc/cabecalho-admin.php"; 

$id = $_GET['id'];
$post = listaUmPost($conexao, $_SESSION['id'], $_SESSION['tipo'], $id);

if( isset($_POST['atualizar']) ) {

	if( empty($_POST["titulo"]) || empty($_POST["texto"]) || 
			empty($_POST["resumo"]) ){
?>            
		<div class="row">
			<p class="col-12 my-2 alert alert-danger" role="alert">Você deve preencher todos os campos</p>
		</div>
<?php        
	} else {
		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];
		$resumo = $_POST['resumo'];
		
		/* Se o campo estiver vazio quer dizer que o usário não quer trocar de imagem */
		if(empty($_FILES['imagem']['name'])){
			$imagem = $_POST['imagem-existente'];
		}else{
			/* Senão, pegou a referêcia da nova imagem */
			$imagem = $_FILES['imagem']['name'];
			/* E faça o upload da nova iagem para o servidor */
			upload($_FILES['imagem']);
		}

		atualizaPost($conexao, $_SESSION['id'], $_SESSION['tipo'], $id, $titulo, $texto, $resumo, $imagem);
		header("location:posts.php");
			
	} // fim if/else empty
} // fim if isset
?>
       
	<div class="row">
		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2 class="text-center">Atualizar Post</h2>

			<form enctype="multipart/form-data" class="mx-auto w-75" action="" method="post" id="form-atualizar"
				name="form-atualizar">

				<input value="<?$post['id']?>" type="hidden" id="id" name="id">

				<div class="form-group">
					<label for="titulo">Título:</label>
					<input 
					value="<?=$post['titulo']?>" class="form-control" type="text" id="titulo" name="titulo" required>
				</div>

				<div class="form-group">
					<label for="texto">Texto:</label>
					<textarea class="form-control" name="texto" id="texto" cols="50" rows="10" required><?=$post['texto']?></textarea>
				</div>

				<div class="form-group">
					<label for="resumo">Resumo (máximo de 300 caracteres):</label>
					<span id="maximo" class="badge badge-success">0</span>
					<textarea class="form-control" name="resumo" id="resumo" cols="50" rows="3" required
						maxlength="300"><?=$post['resumo']?></textarea>
				</div>

				<div class="form-group">
					<label for="imagem-existente">Imagem do post:</label>
					<!-- campo somente leitura, meramente informativo -->
					<input class="form-control" type="text" id="imagem-existente" name="imagem-existente" value="<?=$post['imagem']?>" readonly>
				</div>

				<div class="form-group">
					<label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
					<input class="form-control" type="file" id="imagem" name="imagem"
						accept="image/png, image/jpeg, image/gif, image/svg+xml">
				</div>

				<button class="btn btn-primary" name="atualizar">Atualizar post</button>
			</form>

		</article>
	</div>

<?php
require "../inc/rodape-admin.php"; 
?>