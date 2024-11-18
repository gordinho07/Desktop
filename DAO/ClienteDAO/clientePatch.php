<?php 
   $conexao = conectar();
   function editar_cliente_parcialmente($conexao, $campo, $novoValor, $id){
        $valor = "'$novoValor'";
        $sql = "UPDATE Clientes SET $campo = $valor WHERE id = $id";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };
   if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
      $input = file_get_contents('php://input');
      $dados = json_decode($input, true);
  
      $id = $dados['id'];
      $campo = $dados['campo'];
      $novoValor = $dados['novoValor'];
  
      $resp = editar_cliente_parcialmente($conexao, $campo, $novoValor, $id);
  
      return $resp;
   }
?>