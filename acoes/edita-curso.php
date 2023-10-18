<?php
    session_start();
    require_once 'verifica-logado.php';
    require_once 'conexao.php';

    if(isset($_POST['bt_editar'])) {
        
        $nome_curso  = mysqli_real_escape_string($con, $_POST['nome_curso']);
        $instituicao = mysqli_real_escape_string($con, $_POST['instituicao']);
        $ano_curso   = mysqli_real_escape_string($con, $_POST['ano_curso']);
        $id_curso    = mysqli_real_escape_string($con, $_POST['id_curso']);

        $sql = "UPDATE cursos SET
            nome_curso = '$nome_curso',
            instituicao = '$instituicao',
            ano_curso = '$ano_curso'
            WHERE idcurso = '$id_curso'";
        // echo "$sql";

        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Curso editado com sucesso!";
            header('Location: ../cursos.php');
        } else {
            $_SESSION['mensagem'] = "Erro na edição do curso!";
            header('Location: ../cursos.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
