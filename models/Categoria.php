<?php
class Categoria {
    private $id;
    private $nome;

    function __construct(
        $id,
        $nome,
    ){
        $this->id;
        $this->nome;
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
}