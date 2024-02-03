<?php 
require "../inc/funcoes-usuarios.php";
require "../inc/cabecalho-admin.php"; 

$usuario = lerUmUsuario($conexao, $_SESSION['id']);

if( isset($_POST['atualizar'])) {    
	if( empty($_POST["nome"]) || empty($_POST["email"]) ){
?>
		<div class="row">
				<p class="col-12 my-2 alert alert-danger" role="alert">
				Exceto a senha, todos os campos devem ser preenchidos.</p>
		</div>
<?php        
	} else {
		$nome = $_POST['nome'];
		$email = $_POST['email'];

		// Lógica para análise de senha
		if( empty($_POST['senha']) ){
				$senha = $usuario['senha'];
		} else {
				$senha = verificaSenha($_POST['senha'], $usuario['senha']);
		}    

		atualizaUsuario($conexao, $_SESSION['id'], $nome, $email, $senha, $_SESSION['tipo']);
      
		header("location:index.php");
	} // fim if/else empty
} // fim if isset
?>
	<div class="row">
		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2 class="text-center">Atualizar meu perfil</h2>

			<form action="" method="post" id="form-atualizar" name="form-atualizar" class="mx-auto w-75">
			<input class="form-control" type="hidden" name="id" 
                    value="<?=$usuario['id']?>">

				<div class="form-group">
					<label for="nome">Nome:</label>
					<input class="form-control" required type="text" id="nome" name="nome" placeholder="Nome (obrigatório)" value="<?=$usuario['nome']?>">
				</div>
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input class="form-control" required type="email" id="email" name="email" placeholder="E-mail (obrigatório)" value="<?=$usuario['email']?>">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input class="form-control" type="password" id="senha" name="senha"
						placeholder="Preencha apenas se for alterar">
				</div>

				<button class="btn btn-lg btn-primary" name="atualizar">Atualizar</button>
			</form>
		</article>
	</div>

<?php
require "../inc/rodape-admin.php"; 
?>