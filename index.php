<?php
    session_start();
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0; // se o usuario existir, retorna um erro, senão retorna zero para não dar erro na pagina
?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script>
                    $(document).ready(function(){  //se a pagina foi carregada, dispare essa função

                        //verificar se os campos de usúario e senha foram devidamente preenchidos

                        $('#btn_login').click(function(){ //se o btn_login foi clicado, diapare a função...

                            var campo_vazio = false;

                            if($('#campo_usuario').val() == ''){                        // se o campo_usuario estiver sem valor
                                $('#campo_usuario').css({'border-color': '#A94442'});   // preencha a borda com a cor vermelha
                                campo_vazio = true;
                            } else{
                                 $('#campo_usuario').css({'border-color': '#CCC'});     // senão continua cinza
                            }

                            if($('#campo_senha').val() == ''){                          // se o campo_usuario estiver sem valor
                                $('#campo_senha').css({'border-color': '#A94442'});     // preencha a borda com a cor vermelha
                                campo_vazio = true;
                            }else{
                                 $('#campo_senha').css({'border-color': '#CCC'});       // senão continua cinza
                            }

                            if(campo_vazio) return false;
                        })
                    });
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>

	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
	            <li class="<?= $erro ==1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>

								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>

								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />

							</form>

              <?php

              if($erro == 1){
                  echo '<font color = "#FF0000">Usúario e ou senha invalido(s)</font>'; // mensagem de erro para o usuario
              }

              ?>
						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

        <?php
          // Recupera o variavél que eu crei no registra_usuario.php (se criou)
          // Mostra a mensagem na tela e destrói a sessão
          if (isset($_SESSION['mensagem'])) {
            echo '<div class="alert alert-success" role="alert">'.$_SESSION['mensagem'].'</div>';
            session_unset();
            session_destroy();
          }
         ?>
	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Bem vindo ao twitter clone</h1>
	        <p>Veja o que está acontecendo agora...</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>
