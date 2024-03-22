<?php

namespace App\Controller;

use App\Model\Cliente;
use App\Model\ClienteRepository;

class ClienteController
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function inserirCliente()
    {
    
        if ($this->cliente->getClienteId() !== null) {
            return false; 

      
        $clienteRepository = new ClienteRepository();

       
        $clienteRepository->criarCliente($this->cliente);

        return true; 
    }

}

}

