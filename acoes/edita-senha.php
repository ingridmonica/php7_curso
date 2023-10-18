<?php
    session_start();
    require_once 'verifica-logado.php';
    require_once 'conexao.php';

    if(isset($_POST['bt_editar'])) {
        $idusuario   = $_SESSION['idusuario'];    
        $nova_senha  = md5(mysqli_real_escape_string($con, $_POST['nova_senha']));
        $conf_senha  = md5(mysqli_real_escape_string($con, $_POST['conf_senha']));

        $sql = "UPDATE usuarios SET
            senha = '$nova_senha'
            WHERE idusuario = '$idusuario'";
        // echo "$sql"; exit;
        
        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Senha alterada com sucesso!";
            unset($_SESSION['idusuario']); // para evitar acessos sem fazer login
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro na alteração da senha!";
            header('Location: ../configuracoes.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
