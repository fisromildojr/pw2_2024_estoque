<?php
require_once "models/Produto.php";
require_once "controllers/CategoriaController.php";
class ProdutoController {

    public function findAll(){
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM produto");

        $stmt->execute();
        $produtos = array();

        $categoriaController = new CategoriaController();
        while($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = new Produto($produto["id"], $produto["nome"], $produto["descricao"], $categoriaController->findById($produto["id_categoria"]), $produto["preco"]);
        }
        return $produtos;
    }

    public function save(Produto $produto){
        try{
            $conexao = Conexao::getInstance();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $categoria = $produto->getCategoria()->getId(); 
            $preco = $produto->getPreco();
            $stmt = $conexao->prepare("INSERT INTO produto (nome, descricao, id_categoria, preco) VALUES (:nome, :descricao, :categoria, :preco)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria", $categoria); 
            $stmt->bindParam(":preco", $preco);
    
            $stmt->execute();
    
            $produto = $this->findById($conexao->lastInsertId());
    
            return $produto;
        }catch (PDOException $e){
            echo "Erro ao salvar o produto: " . $e->getMessage();
        }
    }

    public function update(Produto $produto){
        try{
            $conexao = Conexao::getInstance();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $categoria = $produto->getCategoria()->getId();
            $preco = $produto->getPreco();
            $id = $produto->getId();
            $stmt = $conexao->prepare("UPDATE produto SET nome = :nome, descricao = :descricao, preco = :preco, id_categoria = :categoria  WHERE id = :id");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria", $categoria); 
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":id", $id);
    
            $stmt->execute();
    
            $produto = $this->findById($conexao->lastInsertId());
    
            return $produto;
        }catch (PDOException $e){
            echo "Erro ao atualizar a produto: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $conexao = Conexao::getInstance();

            // Excluir Produto
            $stmt = $conexao->prepare("DELETE FROM produto WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['mensagem'] = 'Produto excluído com sucesso!';
                return true;
            } else {
                $_SESSION['mensagem'] = 'O produto não foi encontrado.';
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = 'Erro ao excluir o produto: ' . $e->getMessage();
            return false;
        }
    }

    public function findById($id){
        try{
            $conexao = Conexao::getInstance();
            
            $stmt = $conexao->prepare("SELECT * FROM produto WHERE id = :id");
            $stmt->bindParam(":id", $id);
            
            $stmt->execute();

            $categoriaController = new CategoriaController();            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $produto = new Produto($resultado["id"], $resultado["nome"], $resultado["descricao"], $categoriaController->findById($resultado["id_categoria"]), $resultado["preco"]);
            
            return $produto;
        }catch (PDOException $e){
            echo "Erro ao buscar produto: " . $e->getMessage();
        }
    }

}