<?php 
   
   function editar_cliente($conexao, $u, $id){

        $sql = "UPDATE Clientes SET Nome = '$u->nome', Email = '$u->email', Telefone = '$u->telefone', DataNascimento = '$u->dataNascimento', CPF='$u->cpf', Endereco = '$u->endereco' WHERE ID = $id;";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };

?>