<?php
    // iniciar sessao no arquivo que chama a consulta
    require_once 'verifica-logado.php';
    require_once "conexao.php";
    $id_logado = $_SESSION['idusuario'];

    $sql = "SELECT * FROM formacoes WHERE idusuario = '$id_logado'";

    $resultado = mysqli_query($con, $sql);
