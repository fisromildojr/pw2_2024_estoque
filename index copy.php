<?php
    require_once "models/Conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Para utilizar ícones -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    
    <title>Estoque</title>
</head>
<body>
    <?php
        $conexao = Conexao::getInstance();
        include_once "components/navbar.php";
        // Verifica se existe a variável PG no $_GET
        // Se existe ele pega o valor e seta na variável $pg
        if(!isset($_GET["pg"])){
            $pg = "";
        }else{
            $pg = $_GET["pg"];
        }
        
        //Verifico se o arquivo existe antes de incluir
        if($pg == "" or !file_exists("views/" . $pg . ".php")) {
            //Se não existe inclui pagina de erro
            include_once "views/404.php";
        }else{
            //Se existe ele inclui a tela solicitada
            include_once "views/" . $pg . ".php";
        }
    ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>