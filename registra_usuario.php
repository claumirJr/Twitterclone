<?php

require_once ('db.class.php');

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$usuario_existe = false;
$email_existe = false;

$objDB = new db();
$link = $objDB->conecta_mysql();


//verificar se o usuario já existe
if ($resultado_id = mysqli_query($link, "select * from usuarios where usuario = '$usuario'")) { // se existir o usuario digitado, retorna true, e coloca a condiçao em uma variavel

    $dados_usuario = mysqli_fetch_array($resultado_id); // monta a variavel em um array

    if (isset($dados_usuario['usuario'])) { // detecta se o usuario existe dentro do banco de dados
        $usuario_existe = true;
    }
} else {
    echo 'Erro ao tentar localizar o registro de usuario';
}



// verifica se email já existe
if ($resultado_id = mysqli_query($link, "select * from usuarios where email = '$email'")) { // se existir o email digitado, retorna true, e coloca a condição numa variavel

    $dados_usuario = mysqli_fetch_array($resultado_id); // monta a variavel em um array

    if (isset($dados_usuario['email'])) { // detecta se o usuario existe dentro do banco de dados
        $email_existe = true;
    }
} else {
    echo 'erro ao tentar localizar o registro de e-mail';
}



// se o usuario e senha existir, retorna para a pagina iscrevase
if($usuario_existe || $email_existe){        //se o usuario OU o email existir

    $retorno_get = '';

    if($usuario_existe){
        $retorno_get.="erro_usuario=1&";
    }

    if($email_existe){
        $retorno_get.="erro_email=1&";
    }

    header('location: inscrevase.php?'.$retorno_get); // retorna via get o existente para a pagina inscrevase.php

    die(); // para o codigo para não cadastrar o usuario e e-mail existente
}


//inserir um novo usuario ao banco de dados
if (mysqli_query($link, "insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')")) {
    // Iniciei uma sessão e armazenei a mensagem nela. Redirecionei para o index para o usuario fazer login
    session_start();
    $_SESSION['mensagem'] = 'Usuario registrado com sucesso!';
    header('Location:index.php');
} else {
    echo 'Erro ao registrar o usuário!';
}
