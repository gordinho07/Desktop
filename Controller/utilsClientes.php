<?php 
         function criarResposta($status, $msg){
            $resp = new Resposta($status, $msg);
     
            return $resp;
         }
    
         function receberDadosCliente(){
            $dados = json_decode(file_get_contents('php://input'));
            $nome = $dados->nome;
            $endereco = $dados->endereco;
            $telefone = $dados->telefone;
            $cpf = $dados->cpf;
            $email = $dados->email;
            $dataNascimento = $dados->dataNascimento;
    
            $user = new Cliente("", $nome, $email, $telefone, $dataNascimento, $cpf, $endereco);
            return $user;
        }

       
?>