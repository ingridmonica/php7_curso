<?php
    session_start();
    require_once 'verifica-logado.php';
    require_once 'conexao.php';

    if(isset($_POST['bt_editar'])) {
        
        $nivel       = mysqli_real_escape_string($con, $_POST['nivel']);
        $nome_curso  = mysqli_real_escape_string($con, $_POST['nome_curso']);
        $instituicao = mysqli_real_escape_string($con, $_POST['instituicao']);
        $ano_inicio  = mysqli_real_escape_string($con, $_POST['ano_inicio']);
        $ano_termino = mysqli_real_escape_string($con, $_POST['ano_termino']);
        $situacao    = mysqli_real_escape_string($con, $_POST['situacao']);
        $id_formacao = mysqli_real_escape_string($con, $_POST['id_formacao']);

        $sql = "UPDATE formacoes SET
            nivel = '$nivel',
            nome_curso = '$nome_curso',
            instituicao = '$instituicao',
            ano_inicio = '$ano_inicio',
            ano_termino = '$ano_termino',
            situacao = '$situacao'
            WHERE idformacao = '$id_formacao'";
        // echo "$sql";
        
        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Formação editada com sucesso!";
            header('Location: ../formacoes.php');
        } else {
            $_SESSION['mensagem'] = "Erro na edição da formação!";
            header('Location: ../formacoes.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
