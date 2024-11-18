<?php 

    class Cliente{
        public $id;
        public $nome;
        public $email;
        public $telefone;
        public $dataNascimento;
        public $cpf;
        public $endereco;

        function __construct($id_informado, $nome_informado, $email_informado, $telefone_informado, $dataNascimento_informada, $cpf_informado, $endereco_informado){
            $this->id = $id_informado;
            $this->nome = $nome_informado;
            $this->email = $email_informado;
            $this->telefone = $telefone_informado;
            $this->dataNascimento = $dataNascimento_informada;
            $this->cpf = $cpf_informado;
            $this->endereco = $endereco_informado;
        }

        
    }

    
?>
