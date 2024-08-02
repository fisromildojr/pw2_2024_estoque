<?php
require_once "controllers/CategoriaController.php";
require_once "models/Categoria.php";

$controller = new CategoriaController();
$categorias = $controller->findAll();

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
                <h1 class="text-center mb-0">Lista de Categorias</h1>
                <a href="?pg=form_categoria" class="btn btn-success" role="button">Cadastrar</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach ($categorias as $categoria) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($categoria->getId()); ?></td>
                            <td><?php echo htmlspecialchars($categoria->getNome()); ?></td>
                            <td>
                                <a class="" href="?pg=form_categoria&id=<?php echo $categoria->getId(); ?>">
                                    <i class="fas fa-eye"></i></a>
                                <a class="" href="?pg=delete_categoria&id=<?php echo $categoria->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>