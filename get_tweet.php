<?php

session_start();

if (!isset($_SESSION['usuario'])) { // se não for iniciada a sessão, volta para o index.php
    header('Location:index.php?erro=1');
}

require_once 'db.class.php';

$id_usuario = $_SESSION['id_usuario'];

$objDB = new db();
$link = $objDB->conecta_mysql();

$resultado_id = mysqli_query($link, " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.id_tweet, t.tweet, u.usuario, u.id FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id) WHERE id_usuario = $id_usuario or id_usuario in(SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = $id_usuario) order by data_inclusao desc");

if($resultado_id){
    
    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        
        $btn_delete_id = 'none';
        
        if($id_usuario == $registro['id']){
            $btn_delete_id = 'block';
        };
        
        
        echo '<a href="#" class="list-group-item">';
        echo '<h4 class="list-group-item-heading">'.$registro['usuario'].'<small> - '.$registro['data_inclusao_formatada']. '</small> <button type="button"  style="display:'.$btn_delete_id.'"  class=" list-group-item-text pull-right btn btn-default btn-xs btn_delete" data-id_tweet="'.$registro['id_tweet'].'">Delete</button></h4>';
        echo '<p class="list-group-item-text">' .$registro['tweet']. '</p>';
        echo '</a>';
        
    }
    
    
}else{
    echo 'Erro na consulta com o banco de dados!';
}

