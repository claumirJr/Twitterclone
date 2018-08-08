<?php

session_start();

if (!isset($_SESSION['usuario'])) { // se não for iniciada a sessão, volta para o index.php
    header('Location:index.php?erro=1');
}

require_once 'db.class.php';

$id_usuario = $_SESSION['id_usuario'];
$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

if($deixar_seguir_id_usuario != '' && $id_usuario != ''){
    $objDB = new db();
    $link = $objDB->conecta_mysql();

    mysqli_query($link, "delete from usuarios_seguidores where id_usuario = $id_usuario and seguindo_id_usuario = $deixar_seguir_id_usuario");
}



