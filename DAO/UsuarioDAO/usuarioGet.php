<?php 
   

   function pegar_usuario($conexao){

    $sql = "SELECT * FROM tbl_usuario";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $usuario = [];

    while ($registro = mysqli_fetch_array($res)) {
        $nome_user = utf8_encode($registro['nome_user']);
        $email = utf8_encode(  $registro['email']);
        $senha = utf8_encode( $registro['senha']);

        
        $novo_usuario = new Usuario($nome_user, $email, $senha);
        array_push($usuario ,$novo_usuario);
    };
    
    fecharConexao($conexao);
    return $usuario;
   };

   
?>