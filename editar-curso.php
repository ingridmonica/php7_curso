<?php
  session_start();
  require_once 'acoes/verifica-logado.php';
  $id_logado    = $_SESSION['idusuario'];
  $email_logado = $_SESSION['email'];
  include_once 'acoes/consulta-curso.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Editar Curso </title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
  <!-- Icones -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- fonte personalizada -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
  <!-- estilo do nosso tema -->
  <link rel="stylesheet" href="assets/css/tema-curriculo.css" />
  <link rel="stylesheet" href="assets/css/form-validation.css" />
  
</head>
<body>

<!-- barra de navegacao -->
 <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">EDITAR</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="nav navbar-nav d-flex justify-content-end" id="links">
            <li><a href="painel.php">X</a></li>
        </ul>
    </div>
  </div>
</nav>

<!-- container fluido 100% -->
<div class="container-fluid bg1 text-center cadcurso" id="quem">

  <h3>Editar Curso</h3>
  
  <form action="acoes/edita-curso.php" method="POST" class="needs-validation container" novalidate>

    <div class="row g-12">

      <div class="col-sm-12">
        <label for="nome_curso" class="form-label">Nome do Curso</label>
        <input type="text" class="form-control" id="nome_curso" name="nome_curso"
          value="<?= $nome_curso ?>" placeholder="" value="" autofocus required>
        <div class="invalid-feedback">
          Digite o nome do curso
        </div>
      </div>

      <div class="col-sm-12">
        <label for="instituicao" class="form-label">Instituição</label>
        <input type="text" class="form-control" id="instituicao" name="instituicao" placeholder=""
          value="<?= $instituicao ?>" required>
        <div class="invalid-feedback">
          Digite o nome da Instituição.
        </div>
      </div>

      <div class="col-md-12">
        <label for="ano_curso" class="form-label">Ano do Curso</label>
        <input type="number" class="form-control" id="ano_curso" name="ano_curso"
          value="<?= $ano_curso ?>" min="1950" max="2050" step="1" required>
        <div class="invalid-feedback">
          Digite o ano do curso
        </div>
      </div>
        <input type="hidden" id="id_curso" name="id_curso" value="<?= $id_curso ?>"/>
      </div>
      <br>
      <button class="w-100 btn btn-dark btn-lg" type="submit" name="bt_editar">
      Editar
      </button>
  
  </form>
</div>

<!-- bootstrap.js -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/form-validation.js"></script>

</body>
</html>