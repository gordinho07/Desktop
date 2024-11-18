<?php 
   

   function pegar_cliente($conexao){

    $sql = "SELECT * FROM Clientes";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $clientes = [];

    while ($registro = mysqli_fetch_array($res)) {
        $id = utf8_encode( $registro['ID']);
        $nome = utf8_encode($registro['Nome']);
        $email = utf8_encode(  $registro['Email']);
        $telefone = utf8_encode( $registro['Telefone']);
        $dataNascimento = utf8_encode( $registro['DataNascimento']);
        $cpf = utf8_encode( $registro['CPF']);
        $endereco = utf8_encode( $registro['Endereco']);
        
        $novo_clientes = new Cliente($id, $nome, $email, $telefone, $dataNascimento, $cpf, $endereco);
        array_push($clientes ,$novo_clientes);
    };
    
    fecharConexao($conexao);
    return $clientes;
   };

   
?>