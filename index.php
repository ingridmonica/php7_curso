<?php 
  //INICIAR SESSÃO (para fazer o login completo)
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico">
    <meta name="description" content="">
    <meta name="author" content="Ingrid Mônica">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/geral.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <!-- Fundamental a definição do action  e os name="email", senha e bt_entrar-->
  <form action="acoes/login.php" method="POST">

      <!-- Quando tivermos uma mensagem vai ser escrita acima do nome login -->
      <?php include_once 'acoes/escreve-mensagem.php' ?>

      <img src="images/favicon.png" alt="Logo" class="img-fluid" max-width="50px" />

      <h1 class="h3 mb-3 fw-normal">Currículo Online - Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="nome@example.com.br" autofocus>
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Senha">
      <label for="floatingPassword">Senha</label>
    </div>
    <br>
    
    <button class="w-100 btn btn-lg btn-dark" type="submit" name="bt_entrar">Entrar</button>

    <div class='alert'> Não tem login? <a class='btn btn-warning' href='cadastrar-usuario.php'> Cadastre-se </a> </div>

    <p class="mt-5 mb-3 "> Ingrid Mônica &copy; 2023</p>

  </form>
</main>
 
  </body>
  <!-- SCRIPT -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</html>