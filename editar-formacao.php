<?php
  session_start();
  require_once 'acoes/verifica-logado.php';
  $id_logado    = $_SESSION['idusuario'];
  $email_logado = $_SESSION['email'];
  include_once 'acoes/consulta-formacao.php';
  
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Editar Formação </title>

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
<div class="container-fluid bg1 text-center" id="quem">

  <h3>Editar Formação</h3> 
  
  <form action="acoes/edita-formacao.php" method="POST" class="needs-validation container" novalidate>

  <div class="row g-12">

      <div class="col-md-12">
        <label for="nivel" class="form-label">Nível de Escolaridade</label>
        <select class="form-select" id="nivel" name="nivel" autofocus required>
          <optgroup label="Dado anterior">
          <option value="<?= $nivel; ?>"><?= $nivel; ?></option>
          </optgroup>
          
          <option value="Ensino Médio">Ensino Médio</option>
          <option value="Ensino Técnico">Ensino Técnico</option>
          <option value="Ensino Superior">Ensino Superior</option>
          <option value="Pós-Graduação">Pós-Graduação</option>
          <option value="Mestrado">Mestrado</option>
          <option value="Doutorado">Doutorado</option>
        </select>
        <div class="invalid-feedback">
          Escolha o nível de escolaridade.
        </div>
      </div>

      <div class="col-sm-12">
        <label for="nome_curso" class="form-label">Nome do Curso</label>
        <input type="text" class="form-control" id="nome_curso" name="nome_curso" placeholder=""
          value="<?= $nome_curso; ?>" required>
        <div class="invalid-feedback">
          Digite o nome do curso
        </div>
      </div>

      <div class="col-sm-12">
        <label for="instituicao" class="form-label">Instituição</label>
        <input type="text" class="form-control" id="instituicao" name="instituicao" placeholder=""
          value="<?= $instituicao; ?>" required>
        <div class="invalid-feedback">
          Digite o nome da Instituição.
        </div>
      </div>

      <div class="col-md-12">
        <label for="ano_curso" class="form-label">Ano do Início</label>
        <input type="number" class="form-control" id="ano_inicio" name="ano_inicio"
          value="<?= $ano_inicio; ?>" min="1950" max="2050" step="1" required>
        <div class="invalid-feedback">
          Digite o ano do início do curso
        </div>
      </div>

      <div class="col-md-12">
        <label for="ano_curso" class="form-label">Ano do Término</label>
        <input type="number" class="form-control" id="ano_termino" name="ano_termino"
          value="<?= $ano_termino; ?>" min="1950" max="2050" step="1">
        <div class="invalid-feedback">
          Digite o ano do término do curso
        </div>
      </div>

      <div class="col-md-12">
        <label for="situacao" class="form-label">Situação</label>
        <select class="form-select" id="situacao" name="situacao" required>
          <optgroup label="Dado anterior">
            <option value="<?= $situacao; ?>"><?= $situacao; ?></option>
          </optgroup>

          <option value="Cursando">Cursando</option>
          <option value="Concluído">Concluído</option>
        </select>
        <div class="invalid-feedback">
          Escolha a situação do seu curso.
        </div>
      </div>
        <input type="hidden" id="id_formacao" name="id_formacao" value="<?= $id_formacao ?>" />
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