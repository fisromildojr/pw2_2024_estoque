<?php
// include_once("restrict.php");
require_once "controllers/ProdutoController.php";
require_once "controllers/CategoriaController.php";
// Inicia a sessão
if (isset($_GET["id"])) {
	$produtoController = new ProdutoController();
	$produto = $produtoController->findById($_GET["id"]);
}

if (
    isset($_POST["nome"]) &&
    isset($_POST["descricao"]) &&
    isset($_POST["id_categoria"]) &&
    isset($_POST["preco"])
) {
	$produtoController = new ProdutoController();
	
	$categoriaId = $_POST["id_categoria"];

	$categoriaController = new CategoriaController();
	$categoria = $categoriaController->findById($categoriaId);

	if ($categoria) {
		// Construindo o Produto
		$produto = new Produto(null, $_POST["nome"], $_POST["descricao"], $categoria, $_POST["preco"]);
	} else {
		echo "Categoria não encontrada.";
	}

	// Salvando ou Atualizando Produto
	if (isset($_GET["id"])) {
		$produto->setId($_GET["id"]);
		$produtoController->update($produto);
	} else {

		$produtoController->save($produto);
	}

	// Voltando pra tela anterior
	// header("Location: ?pg=produtos");
	echo '<script type="text/javascript">
             window.location = "?pg=produtos";
          </script>';

	// Encerra a execução do script php
	exit();
}

?>

<div class="container mt-2">
	<h1 class="text-center mb-0">Cadastro de Produto</h1>
	<form method="POST">

		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($produto) ? $produto->getNome() : ''; ?>">
            <label for="descricao">Descrição</label>
			<input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo isset($produto) ? $produto->getDescricao() : ''; ?>">
			<label for="categoria">Categoria</label>
			<select class="form-control" id="categoria" name="id_categoria">
				<?php
				$categoriaController = new CategoriaController();
				$categorias = $categoriaController->findAll();

				foreach($categorias as $categoria):
					$selected = (isset($produto) && $produto->getCategoria()->getId() == $categoria->getId()) ? "selected" : "";

					echo "<option value=" . $categoria->getId() . ">" . $categoria->getNome() . "</option>";
				endforeach;
				?>
			</select>          
			<label for="preco">Preço</label>
			<input type="text" class="form-control" id="preco" name="preco" value="<?php echo isset($produto) ? $produto->getPreco() : ''; ?>">
		</div>
		<input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="Salvar">
	</form>
</div>