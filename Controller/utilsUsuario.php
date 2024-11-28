<?php 
         function criarResposta($status, $msg){
            $resp = new Resposta($status, $msg);
     
            return $resp;
         }
    
         function receberDadosUsuario() {
            $dados = json_decode(file_get_contents('php://input'));
            
            if (isset($dados->nome_user) && isset($dados->email) && isset($dados->senha)) {
                $nome_user = $dados->nome_user;
                $email = $dados->email;
                $senha = $dados->senha;
        
                // Verifica se o nome do usuário não está vazio
                if (empty($nome_user)) {
                    return null; // Retorna null para indicar que o nome é inválido
                }
        
                $user = new Usuario($nome_user, $email, $senha);
                return $user;
            } else {
                return null; // Retorna null se algum campo estiver ausente
            }
        }
        
       
?>