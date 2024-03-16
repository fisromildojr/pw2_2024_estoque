<?php
class Usuario {
    private $id;
    private $nome;
    private $login;
    private $senha;

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

    function getLogin(){
        return $this->login;
    }
    function setLogin($login){
        $this->login = $login;
    }
    function getSenha(){
        return $this->senha;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }
    
}