<?php
    require 'utilsClientes.php';
    require_once '../DAO/conexao.php';
    require_once '../DAO/ClienteDAO/clienteGet.php';
    require_once '../DAO/ClienteDAO/clientePost.php';
    require_once '../DAO/ClienteDAO/clientePut.php';
    require_once '../DAO/ClienteDAO/clientePatch.php';
    require '../DAO/ClienteDAO/clienteDelete.php';
    require '../Model/Cliente.php';
    require '../Model/Resposta.php';

    $req = $_SERVER;
    $conexao = conectar();
    

     switch ($req["REQUEST_METHOD"]) {
         case 'GET':
            $clientes = json_encode(pegar_cliente($conexao));
            echo $clientes;
             break;


         case 'POST':
            $u = receberDadosCliente();
             $resp = incluir_cliente($conexao, $u);
             $in = new Resposta('', '');
                if($resp){
                   $in = criarResposta('200', 'Incluso com sucesso');
                } else {
                  $in = criarResposta('400', 'não incluso');
                }
             echo json_encode($in);
             break;


         case 'PUT':
            $dados = json_decode(file_get_contents('php://input'));
            $id = $dados->id;
            $u = receberDadosCliente();
            $resp = editar_cliente($conexao, $u, $id);
            $in = new Resposta('', '');
                if($resp){
                   $in = criarResposta('204', 'Atualizado com sucesso');
                } else {
                  $in = criarResposta('400', 'Não atualizado');
                }
            echo json_encode($in);
             break;


         case 'PATCH':
            $dados = json_decode(file_get_contents('php://input'));
            $id = $dados->id;
            $resp = editar_cliente_parcialmente($conexao, $campo, $novoValor, $id);
            $resposta = new Resposta('','');
            if($resp){
                $resposta = criarResposta('204', 'Atualizado com sucesso');
            } else{
               $resposta = criarResposta('400', 'Não atualizado');
            }
            echo json_encode($resposta);
             break;


         case 'DELETE':
            $dados = json_decode(file_get_contents('php://input'));
            $id = $dados->id;
            $resp = deletar_cliente($conexao, $id);
            $resposta = new Resposta('', '');
            if($resp){
                $resposta = criarResposta('204', 'Excluido com suceso');
            } else {
                $resposta = criarResposta('400', 'Não excluido');
            }
             echo json_encode($resposta);
             break;    
             
             
         default:
             break;
     }





?>