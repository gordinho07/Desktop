<?php 
         function criarResposta($status, $msg){
            $resp = new Resposta($status, $msg);
     
            return $resp;
         }
    
         function receberDadosRelatos(){
            $dados = json_decode(file_get_contents('php://input'));
            $relato = $dados->relato;
         

    
            $user = new Relato("", $relato);
            return $user;
        }

       
?>