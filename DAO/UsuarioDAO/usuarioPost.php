<?php 
// Função para incluir um novo usuário (cadastro)
function incluir_usuario($conexao, $u) {
    // Verificar se os campos necessários foram preenchidos
    if (empty($u->nome_user) || empty($u->email) || empty($u->senha)) {
        return ["status" => "400", "msg" => "Dados incompletos para cadastro"];
    }

    // Verificar se o usuário já existe
    $sql_check = "SELECT * FROM tbl_usuario WHERE email = ?";
    $stmt_check = $conexao->prepare($sql_check);
    $stmt_check->bind_param("s", $u->email);
    $stmt_check->execute();
    $res_check = $stmt_check->get_result();

    if ($res_check->num_rows > 0) {
        $stmt_check->close();
        return ["status" => "400", "msg" => "Usuário já existe"];
    }
    $stmt_check->close();

    // Inserir novo usuário no banco de dados
    $sql = "INSERT INTO tbl_usuario (nome_user, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $u->nome_user, $u->email, $u->senha);
        $stmt->execute();
        $stmt->close();
        fecharConexao($conexao);
        return ["status" => "200", "msg" => "Usuário cadastrado com sucesso"];
    } else {
        fecharConexao($conexao);
        return ["status" => "500", "msg" => "Erro ao tentar incluir"];
    }
}

// Função para validar login
// Exemplo de uso da conexão na função validar_login
function validar_login($conexao, $email, $senha) {
   if (empty($email) || empty($senha)) {
       return ["status" => "400", "msg" => "Dados de login incompletos"];
   }

   $sql = "SELECT * FROM tbl_usuario WHERE email = ? AND senha = ?";
   $stmt = $conexao->prepare($sql);

   if ($stmt) {
       $stmt->bind_param("ss", $email, $senha);
       $stmt->execute();
       $res = $stmt->get_result();

       if ($res->num_rows > 0) {
           $usuario = $res->fetch_assoc(); // Retorna os dados do usuário
           $stmt->close();
           return ["status" => "200", "msg" => "Login válido", "usuario" => $usuario];
       } else {
           $stmt->close();
           return ["status" => "401", "msg" => "Login inválido"];
       }
   } else {
       return ["status" => "500", "msg" => "Erro ao tentar validar login"];
   }
}

?>
