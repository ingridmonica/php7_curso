<?php

    // iniciar uma nova sessão
    session_start();
    // verifica se o usuário está logado
    require_once 'verifica-logado.php';
    // chamar nossa conexao
    require_once 'conexao.php';

    if(isset($_POST['bt_cadastrar'])) {
        // pegar os dados postados e fazer o escape
        $nome_curso  = mysqli_real_escape_string($con, $_POST['nome_curso']);
        $instituicao = mysqli_real_escape_string($con, $_POST['instituicao']);
        $ano_curso   = mysqli_real_escape_string($con, $_POST['ano_curso']);
        $idusuario   = mysqli_real_escape_string($con, $_SESSION['idusuario']);

        // INSTRUÇÃO SQL
        $sql = "INSERT INTO cursos (nome_curso, instituicao, ano_curso, idusuario) VALUES ('$nome_curso', '$instituicao', '$ano_curso', '$idusuario')";

        // EXECUTAR INSTRUCAO SQL E VERIFICAR SUCESSO
        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
            $_SESSION['status']   = "success";
            header('Location: ../painel.php');
        } else {
            $_SESSION['mensagem'] = "Não foi possível cadastrar curso";
            $_SESSION['status']   = "danger";
            header('Location: ../painel.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }