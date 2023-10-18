<?php

    // se não está setado uma variável de usuário ou não está setado uma variável de email, 
    // redireciona para a página index
    if(!isset($_SESSION['idusuario']) || !isset($_SESSION['email'])) {
        header('Location: ../index.php');
    }

    // vamos usar estearquivo em todas as páginas da aplicação que o usuário não possa 
    // acessar caso não esteja logado