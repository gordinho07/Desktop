<?php 
   

   function pegar_relato($conexao){

    $sql = "SELECT * FROM tbl_relatos";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $relatos = [];

    while ($registro = mysqli_fetch_array($res)) {
        $relato = utf8_encode($registro['relato']);
        $data_postagem = utf8_encode(  $registro['data_postagem']);
  

        
        $novo_relatos = new Relato($relato, $data_postagem);
        array_push($relatos ,$novo_relatos);
    };
    
    fecharConexao($conexao);
    return $relatos;
   };

   
?>