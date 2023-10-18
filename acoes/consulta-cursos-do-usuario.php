<?php
    // iniciar sessao no arquivo que chama a consulta
    require_once 'verifica-logado.php';
    require_once "conexao.php";
    $id_logado = $_SESSION['idusuario'];

    $sql = "SELECT * FROM cursos WHERE idusuario = '$id_logado'";
    //echo "$sql";
    
    $resultado = mysqli_query($con, $sql);
