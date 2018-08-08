<?php


session_start();

if (!isset($_SESSION['usuario'])) { // se não for iniciada a sessão, volta para o index.php
    header('Location:index.php?erro=1');
}

require_once 'db.class.php';

$id_usuario = $_SESSION['id_usuario'];
$delete_tweet =$_POST['id_tweet'];

$objDB = new db();
$link = $objDB->conecta_mysql();

mysqli_query($link, "DELETE FROM tweet WHERE id_tweet = '$delete_tweet';");

