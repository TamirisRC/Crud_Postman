<?php

namespace App;

require "../vendor/autolad.php";

use App\Model\Cliente;
use App\Controller\ClienteController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    exit(0);
}

$data = json_decode(file_get_contents("php://input"));

if (
    isset($data->nome, $data->email, $data->cidade, $data->estado) &&
    !empty($data->nome)&&
    !empty($data->email)&&
    !empty($data->cidade)&&
    !empty($data->estado)
){

    $cliente = new Cliente(
        null,
        $data->nome,
        $data->email,
        $data->cidade,
        $data->estado
    );

    $clienteController = new ClienteController($cliente);

    if ($clienteController->inserirCliente()){
        echo json_encode(["message" => "Cliente inserido com sucesso "]);
    } else{
        echo json_encode(["message" => "Falha ao inserir "]);
    }

} else {
    http_response_code(400);
    echo json_encode(["error" => "Dados de entrada inválidos"]);
    exit;
}