<?php 

    class Usuario{
        public $nome;
        public $email;
        public $senha;

        function __construct($nome_informado, $email_informado, $senha_informada){

            $this->nome = $nome_informado;
            $this->email = $email_informado;
            $this->senha = $senha_informada;
        }        
    }
?>
