<?php
    // iniciar sessao no arquivo que chama a consulta session_start();
    require_once 'verifica-logado.php';
    require_once "conexao.php";
    $id_logado = $_SESSION['idusuario'];
    // PEGAR O ID DO CURSO
    if(isset($_GET['id'])) {

        $id_curso = mysqli_real_escape_string($con, $_GET['id']);

        $sql = "SELECT * FROM cursos WHERE idcurso = '$id_curso'";
        // echo "$sql";
        
    $resultado = mysqli_query($con, $sql);

    $dados = mysqli_fetch_array($resultado);
        
    // criar variaveis para cada dado do array associativo
        $id_curso      = $dados['idcurso'];
        $nome_curso    = $dados['nome_curso'];
        $instituicao   = $dados['instituicao'];
        $ano_curso     = $dados['ano_curso'];

        // depois escrever em tela nos campos

    } // fim do if que pega o id do curso