<?php
require_once "controllers/ProdutoController.php";

if (isset($_GET["id"])) {
    $produtoController = new ProdutoController();
    $produtoController->delete($_GET["id"]);

    // Voltando pra tela anterior
    // header("Location: ?pg=produtos");
    echo '<script type="text/javascript">
             window.location = "?pg=produtos";
          </script>';
}