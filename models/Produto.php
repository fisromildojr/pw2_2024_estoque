<?php
require_once "Categoria.php";

class Produto {
    private $id;
    private $nome;
    private $descricao;
    private $categoria;
    private $preco;

    function __construct(
        $nome,
        $descricao,
        Categoria $categoria,
        $preco,
    ){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->preco = $preco;
    }

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }

    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome = $nome;
    }

    function getDescricao(){
        return $this->descricao;
    }
    function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    function getCategoria(){
        return $this->categoria;
    }
    function setCategoria(Categoria $categoria){
        $this->categoria = $categoria;
    }

    function getPreco(){
        return $this->preco;
    }
    function setPreco($preco){
        $this->preco = $preco;
    }

}