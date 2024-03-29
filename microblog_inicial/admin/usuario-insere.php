<?php 
require "../inc/funcoes-usuarios.php";
require "../inc/cabecalho-admin.php"; 

if($_SESSION['tipo'] != 'admin' ){
	header("location:nao-autorizado.php");
	exit;
}

if( isset($_POST['inserir'])) {

	if( empty($_POST["nome"]) || empty($_POST["email"]) || 
			empty($_POST["senha"]) || empty($_POST["tipo"]) ){
?>            
		<div class="row">
				<p class="col-12 my-2 alert alert-danger" role="alert">Você deve preencher todos os campos</p>
		</div>
<?php        
	} else {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$tipo = $_POST['tipo'];
		$senha = codificaSenha($_POST['senha']); // nunca armazenar senha com plai text (texto purpo)
		
		insereUsuario($conexao, $nome, $email, $senha, $tipo);
		header("location:usuarios.php");
	} // fim if/else empty  
} // fim if isset
?> 
       
	<div class="row">
		<article class="col-12 bg-white rounded shadow my-1 py-4">
			<h2 class="text-center">Inserir Usuário</h2>
			<form class="mx-auto w-75" action="" method="post" id="form-inserir" name="form-inserir">
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input class="form-control" type="text" id="nome" name="nome" required>
				</div>
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input class="form-control" type="password" id="senha" name="senha" required>
				</div>
				<div class="form-group">
					<label for="tipo">Tipo:</label>
					<select class="custom-select" name="tipo" id="tipo" required>
						<option value=""></option>
						<option value="editor">Editor</option>
						<option value="admin">Administrador</option>
					</select>
				</div>
				<button class="btn btn-primary" id="inserir" name="inserir">Inserir usuário</button>
			</form>

		</article>
	</div>

<?php require "../inc/rodape-admin.php"; ?>