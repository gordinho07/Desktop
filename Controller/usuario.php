<?php
header("Access-Control-Allow-Origin: *"); // Permite qualquer origem. Para mais segurança, substitua * por http://localhost:19006
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require 'utilsUsuario.php';
require_once '../DAO/conexao.php';
require_once '../DAO/UsuarioDAO/usuarioGet.php';
require_once '../DAO/UsuarioDAO/usuarioPost.php';
require '../Model/Usuario.php';
require '../Model/Resposta.php';

$req = $_SERVER;
$conexao = conectar();

switch ($req["REQUEST_METHOD"]) {
    case 'GET':
        $usuarios = json_encode(pegar_usuario($conexao));
        echo $usuarios;
        break;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true); // Recebe os dados do corpo da requisição
        if (isset($dados['acao']) && $dados['acao'] === 'login') {
            // Validação de login
            $email = $dados['email'];
            $senha = $dados['senha'];
            $usuario = validar_login($conexao, $email, $senha);
            if ($usuario) {
                $resp = criarResposta('200', 'Login realizado com sucesso', $usuario);
            } else {
                $resp = criarResposta('401', 'Email ou senha inválidos');
            }
        } else {
            // Inclusão de usuário (Cadastro)
            $u = receberDadosUsuario();
            $resp = incluir_usuario($conexao, $u);
            if ($resp) {
                $resp = criarResposta('200', 'Usuário cadastrado com sucesso');
            } else {
                $resp = criarResposta('400', 'Erro ao cadastrar usuário');
            }
        }
        echo json_encode($resp);
        break;

    default:
        $resp = criarResposta('405', 'Método não permitido');
        echo json_encode($resp);
        break;
}

?>
