<?php
    
// verifica se temos a variável de sessão chamada 'mensagem'
if(isset($_SESSION['mensagem'])) {
    // cria um alerta dentro do modelo de alerta que tem no bootstrapi(componente)
    echo "
        <div class='alert alert-".$_SESSION['status']." alert-dismissible fade show mensagem' 
        role='alert'>
            {$_SESSION['mensagem']} <br>   
            <span class='alert-warning'>".@$_SESSION['msg_upload']."</span>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        //Variável de sessão STATUS pra ter a mensagem de foi sucesso ou erro, passada nos arquivos de criação também
    
    // session_unset(); // DESTRUIR VARIAVEIS DE SESSAO e mensagem
    unset($_SESSION['mensagem']);
    unset($_SESSION['msg_upload']);
}

// na linha 10 temos uma tag de span com um arquivo de mensagem ['msg_upload'].
// A variável globa _SESSION só vai funcionar quando tiver fazendo o upload de imagem (quando tiver fazendo a 
// edição do perfil). O @ pra ignorar os avisos e erros que possam ser gerado pewlo fato de não existir esta 
// variável. 