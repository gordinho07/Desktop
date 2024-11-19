<?php 
         function criarResposta($status, $msg){
            $resp = new Resposta($status, $msg);
     
            return $resp;
         }
    
         function receberDadosUsuario(){
            $dados = json_decode(file_get_contents('php://input'));
            $nome = $dados->nome;
            $email = $dados->email;
            $senha = $dados->senha;
    
            $user = new Usuario("", $nome, $email, $senha);
            return $user;
        }

       
?>