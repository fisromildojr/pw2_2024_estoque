<?php
require_once "../models/Conexao.php";
require_once "../models/Usuario.php";

class UsuarioController {
    public function login($login, $senha)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * 
            FROM usuario WHERE login = :login");
            $stmt->bindParam(":login", $login);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultado) {
                $usuario = new Usuario(
                    $resultado["id"], 
                    $resultado["nome"], 
                    $resultado["login"], 
                    $resultado["senha"]
            );
                if ($senha===$usuario->getSenha()) {
                    $_SESSION['id_usuario'] = $usuario->getId();
                    $_SESSION['nome_usuario'] = $usuario->getNome();
                    $_SESSION['login_usuario'] = $usuario->getLogin();
                    header("Location: ../index.php");
                } else {
                    $_SESSION['mensagem'] = 'Senha incorreta';
                    return false;
                }
            } else {
                $_SESSION['mensagem'] = 'Usuário não encontrado';
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar a usuario: " . $e->getMessage();
        }
    }
}