<?php
    // iniciar sessao no arquivo que chama a consulta
    require_once 'verifica-logado.php';
    require_once "conexao.php";
    $id_logado = $_SESSION['idusuario'];

    $sql = "SELECT * FROM cursos WHERE idusuario = '$id_logado'";
    //echo "$sql";
    
    $resultado = mysqli_query($con, $sql);

    while($dados = mysqli_fetch_array($resultado)) {
        // criar variaveis para cada dado do array associativo
        $idcurso       = $dados['idcurso'];
        $nome_curso    = $dados['nome_curso'];
        $instituicao   = $dados['instituicao'];
        $ano_curso     = $dados['ano_curso'];

        // escrever em tela
    echo "
    <li class='list-group-item'>
      <a href='editar-curso.php?id={$idcurso}'><i class='bi bi-pencil-square'></i></a>
      <a href='apaga-curso.php?id={$idcurso}' data-bs-toggle='modal' data-bs-target='#exampleModal{$idcurso}'><i class='bi bi-trash'></i></a>
      $idcurso - $nome_curso - $instituicao - $ano_curso
    </li>
    <!-- modal OBS mudar o numero no id para ficar igual id no banco de dados -->
    <div class='modal fade' id='exampleModal{$idcurso}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Apagar</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            Deseja apagar o curso {$idcurso} ?
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
            
            <form action='acoes/apaga-curso.php' method='POST'>
              <input type='hidden' name='idcurso' value='{$idcurso}'>
              <button type='submit' class='btn btn-primary' name='bt_apagar'>Sim</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- fim modal -->";
    } // fim while
