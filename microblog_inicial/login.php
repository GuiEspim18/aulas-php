<?php 
require "inc/funcoes-usuarios.php";
require "inc/funcoes-sessao.php";
require "inc/cabecalho.php"; 

/* Mensagens de feedback */
if( isset($_GET['acesso_proibido']) ){
  $feedback = "Você deve logar primeiro!";
} elseif( isset($_GET['logout']) ) {
  $feedback = "Você saiu do sistema!";
} elseif( isset($_GET['nao_encontrado']) ) {
  $feedback = "Usuário não encontrado!";
} elseif( isset($_GET['senha_incorreta']) ) {
  $feedback = "A senha está errada!";          
} elseif( isset($_GET['campos_obrigatorios']) ) {
  $feedback = "Você deve preencher todos os campos!";
} else {
  $feedback = "Nessesário fazer acesso!";
} // fim if/else feedbacks



if(isset($_POST['entrar'])){
    
	if( empty($_POST['email']) || empty($_POST['senha']) ){
		// Se não preencheu o formulário
		header("location:login.php?campos_obrigatorios");
	} else {
		// Se preencheu o formulário
		// mysqli_real_scape minimiza as injeções sql
		// Para a sena não precisa pois ela já foi criptografada
		$email = mysqli_real_escape_string($conexao, $_POST['email']);
		$senha = $_POST['senha'];

		/* Verificando se o emial informado está cadastrado */
		$usuario = buscaUsuario($conexao, $email);
		if($usuario != null){
			// Se o usuário for diferente de nulo
			if(password_verify($senha, $usuario['senha'])){
				// verificando senha
				login($usuario['id'], $usuario['nome'], $usuario['email'], $usuario['tipo']);
				header("location:admin/index.php");
			}else{
				header("location:login.php?senha_incorreta");
			}
		}else{
			header("location:login.php?nao_encontrado");
		}
	} // if/else empty

} // fim if isset
?>
	<div class="row">
		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2 class="text-center">Acesso à área administrativa</h2>

			<form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50">

				<p class="my-2 alert alert-warning text-center">
					<?=$feedback?>
				</p>

				<div class="form-group">
					<label for="email">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input class="form-control" type="password" id="senha" name="senha">
				</div>

				<button class="btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

			</form>
		</article>

	</div>

<?php
require "inc/rodape.php"; 
?>