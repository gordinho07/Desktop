<?php
header("Access-Control-Allow-Origin: *"); // Permite qualquer origem. Para mais segurança, substitua * por http://localhost:19006
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");

    require 'utilsRelatos.php';
    require_once '../DAO/conexao.php';
    require_once '../DAO/RelatoDAO/relatoGet.php';
    require_once '../DAO/RelatoDAO/relatoPost.php';
    require '../Model/Relato.php';
    require '../Model/Resposta.php';

    $req = $_SERVER;
    $conexao = conectar();
    

     switch ($req["REQUEST_METHOD"]) {
         case 'GET':
            $relatos = json_encode(pegar_relato($conexao));
            echo $relatos;
             break;


         case 'POST':
            $u = receberDadosRelatos();
             $resp = incluir_relato($conexao, $u);
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