<?php 
   

   function pegar_usuario($conexao){

    $sql = "SELECT * FROM cadastro";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $usuario = [];

    while ($registro = mysqli_fetch_array($res)) {
        $nome = utf8_encode($registro['nome']);
        $email = utf8_encode(  $registro['email']);
        $senha = utf8_encode( $registro['senha']);

        
        $novo_usuario = new Usuario($nome, $email, $senha);
        array_push($usuario ,$novo_usuario);
    };
    
    fecharConexao($conexao);
    return $usuario;
   };

   
?>