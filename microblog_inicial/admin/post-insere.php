<?php 
require "../inc/funcoes-posts.php"; 
require "../inc/cabecalho-admin.php"; 


if( isset($_POST['inserir']) ) {

	if( empty($_POST["titulo"]) || empty($_POST["texto"]) || 
			empty($_POST["resumo"]) || e($_FmptyILES["imagem"]) ){
?>
		<div class="row">
			<p class="col-12 my-2 alert alert-danger" role="alert">Você deve preencher todos os campos</p>
		</div>
<?php        
	} else {
		// htmlspecialchars vai lidar com os elementos html através de injeções, ele entende todo código como texto
		$titulo = htmlspecialchars($_POST['titulo']);
		$texto = htmlspecialchars($_POST['texto']);
		$resumo = htmlspecialchars($_POST['resumo']);

		// Array super global files para arquivos
		$imagem = $_FILES['imagem'];
		/* echo "<pre>";
		var_dump($imagem);
		echo "</pre>"; */
		upload($imagem);
		inserePost($conexao, $titulo, $texto, $resumo, $imagem['name'], $_SESSION['id']);
		header("localhost:posts.php");
			
	} // fim if/else empty
} // fim if isset
?>
       
<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		<h2 class="text-center">Inserir Post</h2>

		<!-- O atributo enctype é necessário para o formulário aceitar arquivos -->
		<form enctype="multipart/form-data" class="mx-auto w-75" action="" method="post" id="form-inserir"
			name="form-inserir">
			<div class="form-group">
				<label for="titulo">Título:</label>
				<input class="form-control" required type="text" id="titulo" name="titulo">
			</div>
			<div class="form-group">
				<label for="texto">Texto:</label>
				<textarea class="form-control" required name="texto" id="texto" cols="50" rows="10"></textarea>
			</div>
			<div class="form-group">
				<label for="resumo">Resumo (máximo de 300 caracteres):</label>
				<span id="maximo" class="badge badge-danger">0</span>
				<textarea class="form-control" required name="resumo" id="resumo" cols="50" rows="3" maxlength="300"></textarea>
			</div>

			<div class="form-group">
				<label for="imagem" class="form-label">Selecione uma imagem:</label>
				<input required class="form-control" type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif, image/svg+xml">
			</div>

			<button class="btn btn-primary" id="inserir" name="inserir">Inserir post</button>

		</form>


	</article>
</div>

<?php require "../inc/rodape-admin.php"; ?> 