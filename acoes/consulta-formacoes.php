<?php
    // iniciar sessao no arquivo que chama a consulta
    require_once 'verifica-logado.php';
    require_once "conexao.php";
    $id_logado = $_SESSION['idusuario'];

    $sql = "SELECT * FROM formacoes WHERE idusuario = '$id_logado'";
    // echo "$sql";
    
    $resultado = mysqli_query($con, $sql);

   // Comand while pra fazer a inscrita por que pode ter +1 formação (array associativo)
    while($dados = mysqli_fetch_array($resultado)) {
        // criar variaveis para cada dado do array associativo
        $idformacao    = $dados['idformacao'];
        $nivel         = $dados['nivel'];
        $nome_curso    = $dados['nome_curso'];
        $instituicao   = $dados['instituicao'];
        $ano_inicio    = $dados['ano_inicio'];
        $ano_termino   = $dados['ano_termino'];
        $situacao      = $dados['situacao'];

        // escrever em tela
    echo "
    <li class='list-group-item'>
      <a href='editar-formacao.php?id={$idformacao}'><i class='bi bi-pencil-square'></i></a>
      <a href='apaga-formacao.php?id={$idformacao}' data-bs-toggle='modal' data-bs-target='#exampleModal{$idformacao}'><i class='bi bi-trash'></i></a>
      $idformacao - $nome_curso - $instituicao - $ano_inicio - $ano_termino - $situacao
    </li>
    <!-- modal OBS mudar o numero no id para ficar igual id no banco de dados -->
    <div class='modal fade' id='exampleModal{$idformacao}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Apagar</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            Deseja apagar a formação {$idformacao} ?
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
            
            <form action='acoes/apaga-formacao.php' method='POST'>
              <input type='hidden' name='idformacao' value='{$idformacao}'>
              <button type='submit' class='btn btn-primary' name='bt_apagar'>Sim</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- fim modal -->";
    } // fim while
