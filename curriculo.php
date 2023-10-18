<?php 
  session_start();
  require_once 'acoes/verifica-logado.php';
  // READ - consultados dados pra exibir posteriormente
  include_once 'acoes/consulta-usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Currículo </title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
  <!-- Icones -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- fonte personalizada -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
  <!-- estilo do nosso tema -->
  <link rel="stylesheet" href="assets/css/tema-curriculo.css" />
  
</head>
<body>

<!-- barra de navegacao -->
 <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><?= $nome; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="nav navbar-nav d-flex justify-content-end" id="links">
            <li><a href="#quem">QUEM</a></li>
            <li><a href="#formacao">FORMAÇÃO</a></li>
            <li><a href="#contatos">CONTATOS</a></li>
            <li><a href="#gerar-pdf.php">GERAR PDF</a></li>
            <li><a href="painel.php">X</a></li>
        </ul>
    </div>
  </div>
</nav>

<!-- container fluido 100% -->
<div class="container-fluid bg1 text-center" id="quem">
  <h3>Quem sou eu?</h3> 
  <img src="fotos/<?= $_SESSION['foto']; ?>" class="img-responsive img-redonda" style="display:inline" alt="Foto" width="200"> <br>
<br>  <h5> <?= $nome ?> </h5>
  <h4> <?= $nacionalidade ?>, <?= $estado_civil ?>, <?= $idade; ?> anos </h4>
  <h4> <i class="bi bi-phone"></i> <?= $celular ?> </h4>
  <h4> <i class="bi bi-envelope"></i> <?= $email ?> </h4>
  <a href="#" class="btn btn-light btn-lg bt">
    <i class="bi bi-arrow-up-circle"></i> Topo
  </a>
</div>

<!-- container fluido 100% -->
<div class="container-fluid bg2 text-center" id="formacao">
  <h3> <i class="bi bi-easel"></i> Formação </h3>
  <ul class="list-group lista" style="color:#222;">

    <?php 
      include_once 'acoes/consulta-formacoes-do-usuario.php';
      while ($dados = mysqli_fetch_assoc($resultado)) {
        $idformacao    = $dados['idformacao'];
        $nivel         = $dados['nivel'];
        $nome_curso    = $dados['nome_curso'];
        $instituicao   = $dados['instituicao'];
        $ano_inicio    = $dados['ano_inicio'];
        $ano_termino   = $dados['ano_termino'];
        $situacao      = $dados['situacao'];
      // escrever em tela
      echo "<li class='list-group-item'> $nome_curso -  $instituicao - $ano_inicio-$ano_termino - $situacao </li>";
    } // fim while
    ?>
  </ul>
  <br>
  <h3> <i class="bi bi-book"></i> Cursos </h3>
  <ul class="list-group lista" style="color:#222;">
    <?php
        include_once 'acoes/consulta-cursos-do-usuario.php';
        while ($dados = mysqli_fetch_assoc($resultado)) {
          $nome_curso    = $dados['nome_curso'];
          $instituicao   = $dados['instituicao'];
          $ano_curso     = $dados['ano_curso'];
        // escrever em tela
        echo "<li class='list-group-item'> $nome_curso -  $instituicao - $ano_curso </li>";
      } // fim while
      ?>
  </ul>

  <br>
  <a href="#" class="btn btn-light btn-lg bt">
    <i class="bi bi-arrow-up-circle"></i> Topo
  </a>
  
</div>

<!-- container fluido 100% -->
<div class="container-fluid bg3 text-center" id="contatos">
  <h3>Contatos</h3>
  <div class="row" id="contat">
    <div class="col-sm-4">
      <p> <i class="bi bi-geo-alt"></i>  <?= $endereco; ?> </p>
      <img src="images/img1.jpg" class="img-responsive rounded" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4">
      <p> <i class="bi bi-envelope"></i> <?= $email; ?> </a> </p>
      <img src="images/img2.jpg" class="img-responsive rounded" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4">
      <p> <i class="bi bi-phone"></i> <?= $celular; ?> </p>
      <img src="images/img3.jpeg" class="img-responsive rounded" style="width:100%" alt="Image">
    </div>
  </div>
  <br>
  <a href="#" class="btn btn-light btn-lg bt">
    <i class="bi bi-arrow-up-circle"></i> Topo
  </a>
</div>  

<!-- bootstrap.js -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>