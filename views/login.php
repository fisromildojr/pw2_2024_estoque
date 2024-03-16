<?php
require_once "../controllers/UsuarioController.php";

// Inicia a sessão
session_start();

if (isset($_POST["login"]) && isset($_POST["senha"])) {
	$usuarioController = new UsuarioController();
	$usuarioController->login($_POST["login"], $_POST["senha"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulário de Login</title>
	<!-- Área para os Scripts CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Título da Página -->

	<style>
		body {
			background-image: url('../images/logistica.avif');
			background-size: cover;
			background-position: center;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			/* background-color: rgba(0, 0, 0, 0.8); */
		}

		.card {
			max-width: 400px;
			margin: 0 auto;
		}

		.custom-heading {
			font-family: "Arial Black", sans-serif;
			font-size: 30px;
			font-weight: bold;
			color: #000;
		}
	</style>
</head>

<body>
	<div class="container">

		<div class="card rounded">
			<div class="card-body">
				<form method="POST">
					<div class="form-group">
						<h1 class="text-center custom-heading">Estoque</h1>
					</div>
					<div class="form-group">
						<label for="login">Login:</label>
						<input type="text" class="form-control" id="login" name="login" placeholder="Digite seu login" required>
					</div>
					<div class="form-group">
						<label for="senha">Senha:</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
					</div>
					<?php
					if (isset($_SESSION["mensagem"])) {
					?>
						<div class="alert alert-warning " role="alert">
							<strong>ERRO:</strong>
							<?php
							echo $_SESSION["mensagem"];
							unset($_SESSION["mensagem"]);
							?>
						</div>
					<?php } ?>
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>