<?php 

    class Usuario{
        public $nome_user;
        public $email;
        public $senha;

        function __construct($nome_user_informado, $email_informado, $senha_informada){

            $this->nome_user = $nome_user_informado;
            $this->email = $email_informado;
            $this->senha = $senha_informada;
        }        
    }
?>
