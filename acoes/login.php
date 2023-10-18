<?php
    session_start();            // iniciar sessao
    require_once 'conexao.php'; // chamar conexao

if(isset($_POST['bt_entrar'])) {
    // pegar os dados postados e fazer o escape
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $senha = md5(mysqli_real_escape_string($con, $_POST['senha']));

    // CONSULTAR NO BANCO DE DADOS
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha';";
    
    // EXECUTAR A INSTRUCAO SQL
    $resultado = mysqli_query($con, $sql);

    // se obtive êxito na consulta, cria um array associativo pra armazenar os dados do usuário
    if(mysqli_affected_rows($con) > 0) {
        // CRIAR ARRAY ASSOCIATIVO COM O RESULTADO DA CONSULTA
        $dados     = mysqli_fetch_array($resultado);
        
        // CRIAR VARIAVEIS DE SESSAO
        $_SESSION['mensagem']  = "Usuário logado com sucesso!";
        $_SESSION['status']    = "success";
        // Variaveis de sessão pegando os dados específicos do usuário, que são fundamentais
        $_SESSION['idusuario'] = $dados['idusuario'];
        $_SESSION['email']     = $dados['email'];
        $_SESSION['foto']      = $dados['foto']; // para mostrar no painel
        header('Location: ../painel.php'); // REDIRECIONAR PARA O PAINEL
    } else {
        // CRIAR VARIAVEIS DE SESSAO
        $_SESSION['mensagem'] = "Erro no login! E-mail ou senha incorretos";
        $_SESSION['status'] = "danger";
        header('Location: ../index.php'); // REDIRECIONAR PARA O INDEX
    }
    
    mysqli_close($con); // fechar conexao
}
