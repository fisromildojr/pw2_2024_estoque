<?php
require_once "models/Categoria.php";
class CategoriaController {

    public function findAll(){
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM categoria");

        $stmt->execute();
        $categorias = array();

        while($categoria = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categorias[] = new Categoria($categoria["id"], $categoria["nome"]);
        }
        return $categorias;
    }

    public function save(Categoria $categoria){
        try{
            $conexao = Conexao::getInstance();
            $nome = $categoria->getNome();
            $stmt = $conexao->prepare("INSERT INTO categoria (nome) VALUES (:nome)");
            $stmt->bindParam(":nome", $nome);

            $stmt->execute();

            $categoria = $this->findById($conexao->lastInsertId());

            return $categoria;
        }catch (PDOException $e){
            echo "Erro ao salvar a categoria: " . $e->getMessage();
        }
    }

    public function update(Categoria $categoria){
        try{

            $conexao = Conexao::getInstance();
            $nome = $categoria->getNome();
            $id = $categoria->getId();
            $stmt = $conexao->prepare("UPDATE categoria SET nome = :nome WHERE id = :id");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":id", $id);
            
            $stmt->execute();
            
            $categoria = $this->findById($conexao->lastInsertId());
            
            return $categoria;
        }catch (PDOException $e){
            echo "Erro ao atualizar a categoria: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $conexao = Conexao::getInstance();

            // Excluir a Categoria
            $stmt = $conexao->prepare("DELETE FROM categoria WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['mensagem'] = 'Categoria excluída com sucesso!';
                return true;
            } else {
                $_SESSION['mensagem'] = 'A categoria não foi encontrada.';
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = 'Erro ao excluir a categoria: ' . $e->getMessage();
            return false;
        }
    }

    public function findById($id){
        try{
            $conexao = Conexao::getInstance();
            
            $stmt = $conexao->prepare("SELECT * FROM categoria WHERE id = :id");
            $stmt->bindParam(":id", $id);
            
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $categoria = new Categoria($resultado["id"], $resultado["nome"]);
            
            return $categoria;
        }catch (PDOException $e){
            echo "Erro ao buscar a categoria: " . $e->getMessage();
        }
    }

}