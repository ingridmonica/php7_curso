<?php
  // INICIAR SESSÃO
  session_start();
  require_once 'acoes/verifica-logado.php';
  require_once 'acoes/consulta-usuario.php'; // consulta para pegar dados do usuario logado
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ingrid Mônica">

    <title>Currículo Online</title>
 
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/geral.css" rel="stylesheet">
    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/carousel.css" rel="stylesheet"> 
    <!-- <link href="assets/css/tema-curriculo.css" rel="stylesheet" />  -->
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Currículo Online</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="perfil.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="formacoes.php">Formações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cursos.php">Cursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="curriculo.php">Currículo</a>
          </li>

        </ul>
        <img src="fotos/<?= $_SESSION['foto'] ?>" class="img-responsive img-redonda" style="display:inline" alt="Foto" width="25"> &nbsp; &nbsp;
        <!-- div com a class co o nome 'dados-usuario' com um elemento php dentro que imprime o valor da variável de sessão email no html
             só tereiesse emai se o usuário estiver logado -->
        <div class="dados-usuario"> <?= $_SESSION['email']; ?> </div>
        <a href="acoes/logout.php" class="btn btn-danger">Sair</a>
      </div>
    </div>
  </nav>
</header>

<main>

  <div class="container-fluid"> <!-- div criada na parte 4 -->
    <?php include_once 'acoes/escreve-mensagem.php'; ?>  
  </div>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/imagem01.jpg" alt="Foto de trabalho" />

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Cadastre suas formações</h1>
            <p>Mantenha seu cadastro com suas formações atualizadas.</p>
            <p><a class="btn btn-lg btn-danger" href="cadastrar-formacao.php">Cadastrar Formação</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/imagem02.jpg" alt="Foto de trabalho" />

        <div class="container">
          <div class="carousel-caption">
            <h1>Cadastre seus cursos</h1>
            <p>Mantenha seu cadastro com seus cursos atualizados.</p>
            <p><a class="btn btn-lg btn-success" href="cadastrar-curso.php">Cadastrar Curso</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/imagem03.jpg" alt="Foto de trabalho" />

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Atualize sempre seu perfil</h1>
            <p>Deixe os seus dados pessoais e de contato sempre atualizados.</p>
            <p><a class="btn btn-lg btn-dark" href="perfil.php">Atualizar perfil</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        
        <h2>Cadastro de Formações</h2>
        <p>Cadastre as suas formações.</p>
        <p><a class="btn btn-dark" href="cadastrar-formacao.php">Cadastrar Formações &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        
        <h2>Cadastro de Cursos</h2>
        <p>Cadastre seus cursos.</p>
        <p><a class="btn btn-dark" href="cadastrar-curso.php">Cadastrar Cursos &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        
        <h2>Configurações</h2>
        <p>Altere as configurações da sua conta.</p>
        <p><a class="btn btn-dark" href="configuracoes.php">Configurar &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Ir para o topo</a></p>
    <p>&copy; 2023 Ingrid Mônica &middot; <a href="#">Privacidade</a> &middot; <a href="#">Termos</a></p>
  </footer>
</main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
