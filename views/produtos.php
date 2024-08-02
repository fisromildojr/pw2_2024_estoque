<?php
require_once "controllers/ProdutoController.php";
require_once "models/Produto.php";

$controller = new ProdutoController();
$produtos = $controller->findAll();

// Verificar se existe uma mensagem definida na sessão
if (isset($_SESSION['mensagem'])) {
    echo "<script>alert('" . $_SESSION['mensagem'] . "')</script>";
    unset($_SESSION['mensagem']); // Limpar a variável de sessão após exibir o alerta
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between mb-3">
                <h1 class="text-center mb-0">Lista de Produtos</h1>
                <a href="?pg=form_produto" class="btn btn-success" role="button">Cadastrar</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach ($produtos as $produto) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto->getId()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getNome()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getDescricao()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getCategoria()->getNome()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getPreco()); ?></td>
                            <td>
                                <a class="" href="?pg=form_produto&id=<?php echo $produto->getId(); ?>">
                                    <i class="fas fa-eye"></i></a>
                                <a class="" href="?pg=delete_produto&id=<?php echo $produto->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>