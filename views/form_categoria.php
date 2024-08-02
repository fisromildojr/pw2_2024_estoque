<?php
// include_once("restrict.php");
require_once "controllers/CategoriaController.php";
// Inicia a sessão
if (isset($_GET["id"])) {
	$categoriaController = new CategoriaController();
	$categoria = $categoriaController->findById($_GET["id"]);
}

if (
	isset($_POST["nome"])
) {
	$categoriaController = new CategoriaController();

	// Construindo o Categoria
	$categoria = new Categoria(null, $_POST["nome"]);

	// Salvando ou Atualizando Categoria
	if (isset($_GET["id"])) {
		$categoria->setId($_GET["id"]);
		$categoriaController->update($categoria);
	} else {

		$categoriaController->save($categoria);
	}

	// Voltando pra tela anterior
	// header("Location: ?pg=categorias");
	echo '<script type="text/javascript">
             window.location = "?pg=categorias";
          </script>';

	// Encerra a execução do script php
	exit();
}

?>

<div class="container mt-2">
	<h1 class="text-center mb-0">Cadastro de Categoria</h1>
	<form method="POST">

		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($categoria) ? $categoria->getNome() : ''; ?>">
		</div>
		<input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="Salvar">
	</form>
</div>