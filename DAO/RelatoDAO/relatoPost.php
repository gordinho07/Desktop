<?php 
   
   function incluir_relato($conexao, $u){

        $sql = "INSERT INTO tbl_relatos (relato) VALUES ('$u->relato');";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };

?>