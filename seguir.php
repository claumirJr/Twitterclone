<?php

session_start();

if (!isset($_SESSION['usuario'])) { // se não for iniciada a sessão, volta para o index.php
    header('Location:index.php?erro=1');
}

require_once 'db.class.php';

$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['seguir_id_usuario'];

if($seguir_id_usuario != '' && $id_usuario != ''){
    $objDB = new db();
    $link = $objDB->conecta_mysql();

    mysqli_query($link, "insert into usuarios_seguidores(id_usuario, seguindo_id_usuario ) values ($id_usuario, $seguir_id_usuario)");
}


