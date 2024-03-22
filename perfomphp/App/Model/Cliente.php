<?php 

namespace App\Model;

class Cliente{
    public $cliente_id;
    public $nome;
    public $email;
    public $cidade;
    public $estado;

    public function __construct($cliente_id, $nome, $email, $cidade, $estado){
     
        $this->cliente_id = $cliente_id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function getClienteID(){
        return $this->cliente_id;
    }

    public function setClienteID($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
}