<?php 
   
   function incluir_usuario($conexao, $u){

        $sql = "INSERT INTO Usuario (nome, email, senha) VALUES ('$u->nome', '$u->email','$u->senha');";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };

?>