<?php
require_once "Produto.php";

class Estoque {
    private $id;
    private $produto;
    private $quantidade;

    function __construct(
        $id,
        Produto $produto,
        $quantidade,
    ){
        $this->id = $id;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }
    function getProduto(){
        return $this->produto;
    }
    function setProduto(Produto $produto){
        $this->produto = $produto;
    }
    function getQuantidade(){
        return $this->quantidade;
    }
    function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
}