<?php

session_start();

require_once 'db.class.php';

$objDB = new db();
$link = $objDB->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

// quantidades de tweets

$resultado_id = mysqli_query($link, "SELECT count(*) AS qtde_tweets FROM tweet WHERE id_usuario = $id_usuario");

if($resultado_id){
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
    echo $registro['qtde_tweets'];
}else{
    echo 'Erro ao executar a query';
}


