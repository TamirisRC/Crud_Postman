<?php 

namespace App\Model;

use App\Database\Database;

class ClienteRepository{
    
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function CriaCliente($cliente){

        $query = "INSERT INTO clientes (nome, email, cidade, estado) VALUES (?, ?, ?,?)";
        $params = [$cliente->getNome(), $cliente->getEmail(), $cliente->getCidade(), $cliente->getEstado()];
        $this->db->execute($query, $params);
    }

    public function lerClientes(){
        $query = "SELECT * FROM clientes";
        return $this->db->fetchAll($query);
    }

    public function lerClientesID(){
        $query = "SELECT * FROM clientes WHERE cliente_id = ?";
        $params = [$cliente_id];
        return $this->db->fetch($query, $params);
    }

    public function atualizarClientes(){
        $query = "UPDATE clientes SET nome = ?, email = ?, cidade = ?, estado = ? WHERE cliente_id = ?";
        $params = [$cliente->getNome(), $cliente->getEmail(), $cliente->getCidade(), $cliente->getEstado(), $cliente->getClienteID()];
        $this->db->execute($query, $params);
    }

    public function excluirClientes($cliente_id){
        $query = "DELETE FROM clientes WHERE cliente_id = ?";
        $params = [$cliente_id];
        $this->db->execute($query, $params);
    }
}

