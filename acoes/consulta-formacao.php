<?php
    // iniciar sessao no arquivo que chama a consulta
    require_once 'verifica-logado.php';
    require_once "conexao.php";
    $id_logado = $_SESSION['idusuario'];
    
    // PEGAR O ID DO CURSO
    if(isset($_GET['id'])) {

        $id_formacao = mysqli_real_escape_string($con, $_GET['id']);

    $sql = "SELECT * FROM formacoes WHERE idformacao = '$id_formacao'";
    //echo "$sql";

    $resultado = mysqli_query($con, $sql);

    $dados = mysqli_fetch_array($resultado);
    
    // criar variaveis para cada dado do array associativo
    $idformacao    = $dados['idformacao'];
    $nivel         = $dados['nivel'];
    $nome_curso    = $dados['nome_curso'];
    $instituicao   = $dados['instituicao'];
    $ano_inicio    = $dados['ano_inicio'];
    $ano_termino   = $dados['ano_termino'];
    $situacao      = $dados['situacao'];

        // escrever em tela nos campos do formulario
        
    } // fim if pegar ID
