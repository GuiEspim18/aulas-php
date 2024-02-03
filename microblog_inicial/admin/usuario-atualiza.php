<?php 
require "../inc/funcoes-usuarios.php";
require "../inc/cabecalho-admin.php";

$id = $_GET['id'];
$usuario = lerUmUsuario($conexao, $id);

if( isset($_POST['atualizar'])) {    
	if( empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["tipo"]) ){
?>		
		<div class="row">
			<p class="col-12 my-2 alert alert-danger" role="alert">Exceto a senha, você deve preencher todos os campos</p>
		</div>
<?php		
	} else {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$tipo = $_POST['tipo'];

		/* Lógica para senha 
		Se o campo senha do formulário estiver vazio, o usuário não alterou a senha  */
		if(empty($_POST['senha'])){
			/* se o campo senha esriver vazio ele vai falar que a senha é a mesma que está no banco de dados */
			$senha = $usuario['senha'];
		}else{
			/* Caso o usuário digitou algo no campo senha, precisaremos verificar a senha digitada */
			$senha = verificaSenha($_POST['senha'], $usuario['senha']);
		}// fim do if/else da senha
		atualizaUsuario($conexao, $id, $nome, $email, $senha, $tipo);
		header("location:usuarios.php");
	} //fim do if/else empty
} // Fim do if isset           
?>
       
	<div class="row">
		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2 class="text-center">Atualizar Usuário</h2>

			<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">
					<input class="form-control" type="hidden" value="<?=$usuario['id']?>" name="id">

					<div class="form-group">
							<label for="nome">Nome:</label>
							<input class="form-control" required type="text" id="nome" name="nome" value="<?=$usuario['nome']?>">
					</div>

					<div class="form-group">
							<label for="email">E-mail:</label>
							<input class="form-control" required type="email" id="email" name="email" value="<?=$usuario['email']?>">
					</div>

					<div class="form-group">
							<label for="nova-senha">Senha</label>
							<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
					</div>

					<div class="form-group">
							<label for="tipo">Tipo:</label>
							<select class="custom-select" name="tipo" id="tipo" required>
								<option value=""></option>                  
								<option value="editor" <?php if($usuario['tipo']=='editor'){echo "selected"; } ?>
								>Editor</option>     
								<option	value="admin" <?php if($usuario['tipo']=='admin'){echo "selected"; } ?>>Administrador</option>
							</select>
					</div>
					
					<button class="btn btn-primary" name="atualizar">Atualizar usuário</button>
			</form>
				
		</article>
	</div>

<?php
require "../inc/rodape-admin.php"; 
?>