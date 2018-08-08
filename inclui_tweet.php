<?php


session_start();

if (!isset($_SESSION['usuario'])) { // se não for iniciada a sessão, volta para o index.php
    header('Location:index.php?erro=1');
}

require_once 'db.class.php';

$texto_tweet = $_POST['text_tweet'];
$id_usuario = $_SESSION['id_usuario'];

if($texto_tweet != '' && $id_usuario != ''){
    $objDB = new db();
    $link = $objDB->conecta_mysql();

    mysqli_query($link, "insert into tweet(id_usuario, tweet) values ('$id_usuario', '$texto_tweet')");
}


