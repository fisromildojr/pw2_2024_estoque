<?php
require_once "controllers/CategoriaController.php";

if (isset($_GET["id"])) {
    $categoriaController = new CategoriaController();
    $categoriaController->delete($_GET["id"]);

    // Voltando pra tela anterior
    header("Location: ?pg=categorias");
}