<?php
    require 'utilsClientes.php';
    require_once '../DAO/conexao.php';
    require_once '../DAO/ClienteDAO/clienteGet.php';
    require_once '../DAO/ClienteDAO/clientePost.php';
    require '../Model/Cliente.php';
    require '../Model/Resposta.php';

    $req = $_SERVER;
    $conexao = conectar();
    

     switch ($req["REQUEST_METHOD"]) {
         case 'GET':
            $clientes = json_encode(pegar_usuario($conexao));
            echo $clientes;
             break;


         case 'POST':
            $u = receberDadosUsuario();
             $resp = incluir_usuario($conexao, $u);
             $in = new Resposta('', '');
                if($resp){
                   $in = criarResposta('200', 'Incluso com sucesso');
                } else {
                  $in = criarResposta('400', 'não incluso');
                }
             echo json_encode($in);
             break;
             
         default:
             break;
     }





?>