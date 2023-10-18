<?php

    // Iniciar uma nova sessão
    session_start();
    // Verifica se o usuário esá logado
    require_once 'verifica-logado.php';
    // Chamar nossa conexão
    require_once 'conexao.php';

    // Verificar se o usuário clicou no botão pra poder pegar os dados
    if(isset($_POST['bt_cadastrar'])) {
        // pegar dados postados e fazer o escape dos dados ($con => conexão)
        $nome          = mysqli_real_escape_string($con, $_POST['nome']);
        $nacionalidade = mysqli_real_escape_string($con, $_POST['nacionalidade']);
        $estado_civil  = mysqli_real_escape_string($con, $_POST['estado_civil']);
        $idade         = mysqli_real_escape_string($con, $_POST['idade']);
        $endereco      = mysqli_real_escape_string($con, $_POST['endereco']);
        $celular       = mysqli_real_escape_string($con, $_POST['celular']);
        $email         = mysqli_real_escape_string($con, $_POST['email']);
        $senha         = md5(mysqli_real_escape_string($con, $_POST['senha']));
        $foto          = mysqli_real_escape_string($con, $_FILES['foto']);

        // INSTRUÇÃO SQL
        $sql = "INSERT INTO usuarios (nome, nacionalidade, estado_civil, idade, endereco, celular, email,
        senha) VALUES ('$nome', '$nacionalidade', '$estado_civil', '$idade', '$endereco', '$celular', '$email', '$senha')";

        // Verificação se teve êxito ou não na execução (sucesso) 

        if(mysqli_query($con, $sql)){
            $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
            $_SESSION['status']   = "sucess";
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Não foi possível cadastrar";
            $_SESSION['status']   = "danger";
            header('Location: ../index.php');
        }

        // FECHAR CONEXÃO
        mysqli_close($con);

    }