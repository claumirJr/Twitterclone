<?php

class db{
    private $host = 'localhost';
    private $usuario = 'Lucas_Gll';
    private $senha = 'Pmt@4909';
    private $database = 'twitter_clone';
    
    public function conecta_mysql(){
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database); // conexão com o banco de dados 
        
        mysqli_set_charset($con, 'utf8'); //transformar o banco em ut8
        
        if(mysqli_connect_errno()){ // caso haver um erro de conexão, exibir uma mensagem
            echo 'Erro ao tentar se conectar com o banco de dados MySQL: ' .mysqli_connect_errno();
        }
        
        return $con;
    }
}
