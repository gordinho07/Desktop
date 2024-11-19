<?php
    // parâmetros
    function conectar(){
        $host = 'fdb1032.awardspace.net	';
        $usuario = '4050708_baseapp01';
        $senha = 'AnjosDaGuarda2024#';
        $bd = 'cadastro';

        // realizar a conexão 
        $conection = mysqli_connect($host, $usuario, $senha, $bd);
        return $conection;
    }
 
    function fecharConexao($conexao){
        mysqli_close($conexao);
    }
  
?>