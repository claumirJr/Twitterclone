<?php

session_start();

require_once 'db.class.php';

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']); // senha cripografada MD5

$objDb = new db(); // conexão com o banco de dados
$link = $objDb->conecta_mysql(); // retorna a conexão


$resultado_id = mysqli_query($link, "select id, usuario, email from usuarios where usuario = '$usuario' and senha = '$senha' "); // se o usuario e senha forem iguais do banco de dados retorta o valor

if($resultado_id){ //se o usuario e senha existir
    $dados_usuario = mysqli_fetch_array($resultado_id); // monta a seleção em um array
    
    if(isset($dados_usuario['usuario'])){ // consulta o usuario no array
        
        $_SESSION['id_usuario'] = $dados_usuario['id'];
        $_SESSION['usuario'] = $dados_usuario['usuario']; // cria valores via session
        $_SESSION['email'] = $dados_usuario['email'];
        
        
        header('Location: home.php'); // e encaminha o usuario para a pagina home
    } else {
        header('location: index.php?erro=1'); // se não existir, retorna um erro para o index
        
    }
    
    
}else{
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}



