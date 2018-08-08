<?php

session_start();

require_once 'db.class.php';

$objDB = new db();
$link = $objDB->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

// quantidade de seguidores

$resultado_seg = mysqli_query($link, "SELECT count(*) AS qtde_seg FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario");

if($resultado_seg){
    $registro = mysqli_fetch_array($resultado_seg, MYSQLI_ASSOC);
    echo $registro['qtde_seg'];
}else{
    echo 'Erro ao executar a query';
}