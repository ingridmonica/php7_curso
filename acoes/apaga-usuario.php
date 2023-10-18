<?php
  session_start();
  require_once 'conexao.php';
  include_once 'verifica-logado.php';
    
  if(isset($_POST['bt_apagar'])) {
    $id_logado   = $_SESSION['idusuario'];
    $idusuario   = mysqli_real_escape_string($con, $_POST['idusuario']);
    
    $sql = "DELETE FROM usuarios WHERE idusuario = '$idusuario'";
    // echo "$sql"; exit;
    
    if(mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Usuário apagado com sucesso!";
        unset($_SESSION['idusuario']); // para evitar acessos sem fazer login
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro na exclusão do perfil!";
        header('Location: ../configuracoes.php');
    }
    // FECHAR CONEXAO
    mysqli_close($con);
}
