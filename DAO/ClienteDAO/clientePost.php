<?php 
   
   function incluir_cliente($conexao, $u){

        $sql = "INSERT INTO Clientes (Nome, Email, Telefone, DataNascimento, CPF, Endereco) VALUES ('$u->nome', '$u->email','$u->telefone', '$u->dataNascimento', '$u->cpf','$u->endereco');";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };

?>