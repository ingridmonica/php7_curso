<?php 
  session_start();
  require_once 'acoes/verifica-logado.php';
  // READ - consultados dados
  include_once 'acoes/consulta-usuario.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Perfil </title>

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
      <!--                              Escreve o dado que tá na variável nome (la em cima) -->
      <a class="navbar-brand" href="#"> <?= $nome; ?> </a>
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

  <h3>Quem sou eu? </h3>

  <img src="fotos/<?= $_SESSION['foto'] ?>" class="img-responsive img-redonda" style="display:inline" alt="Foto" width="200">
  
  <form action="acoes/edita-usuario.php" method="POST" enctype="multipart/form-data" class="needs-validation container" novalidate>
    
  <input type="file" name="foto" id="foto" value="<?= $foto; ?>" />

    <div class="row g-12">

      <div class="col-sm-12">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?= $nome; ?>" required>
        <div class="invalid-feedback">
          Digite o seu nome completo.
        </div>
      </div>

      <div class="col-sm-12">
        <label for="nacionalidade" class="form-label">Nacionalidade</label>
        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="" value="<?= $nacionalidade; ?>" required>
        <div class="invalid-feedback">
          Digite a sua nacionalidade.
        </div>
      </div>

      <div class="col-md-12">
        <label for="estado_civil" class="form-label">Estado Civil</label>
        <select class="form-select" id="estado_civil" name="estado_civil" required>
          <!-- Tag <optgroup> cria um grupo de opções, faz uma separação da lista de opções básicas que
             temos e cria uma outra lista com recuo pra mostrar de forma diferente. Nos permite também colocar um rótulo, neste caso 'Dado anterior' -->
          <optgroup label="Dado anterior">
            <option value="<?= $estado_civil; ?>"><?= $estado_civil; ?></option>
          </optgroup>
          <option value="Solteiro">Solteiro(a)</option>
          <option value="Casado">Casado(a)</option>
          <option value="Viúvo">Viúvo(a)</option>
          <option value="Divorciado">Divorciado(a)</option>

        </select>
        <div class="invalid-feedback">
          Informe o seu Estado Civil.
        </div>
      </div>

      <div class="col-md-12">
        <label for="idade" class="form-label">Idade</label>
        <input type="number" class="form-control" id="idade" name="idade" min="10" max="120" 
          step="1" value="<?= $idade; ?>" required>
        <div class="invalid-feedback">
          Informe a sua idade.
        </div>
      </div>

      <div class="col-12">
        <label for="endereco" class="form-label">Endereço completo</label>
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" value="<?= $endereco; ?>" required>
        <div class="invalid-feedback">
          Digite o seu endereço completo, logradouro, nome, número e bairro.
        </div>
      </div>

      <div class="col-md-12">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="(99) 99999-9999"
        value="<?= $celular; ?>" required>
        <div class="invalid-feedback">
          Digite o número do seu celular com DDD.
        </div>
      </div>

      <div class="col-12">
        <label for="email" class="form-label">E-mail</label>
        <div class="input-group has-validation">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" id="email" name="email" placeholder="email@provedor.com" 
            value="<?= $email; ?>" >
        <div class="invalid-feedback">
            Digite o seu e-mail.
          </div>
        </div>
      </div>

      </div>
      <br>
      <button class="w-100 btn btn-dark btn-lg" type="submit" name="bt_atualizar">
      Atualizar
      </button>
  
  </form>
</div>

<!-- bootstrap.js -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/form-validation.js"></script>
</body>
</html>