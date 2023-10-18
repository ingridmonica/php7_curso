<?php

    // UPLOAD

    // verifica se o usuário fez o envio sem informar o nome de um arquivo. Caso sim cai no último else linha 32
    if($_FILES['foto']['name'] != "" || $_FILES['foto']['name'] != null ) {

        $tipos_permitidos = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        // essa função verifica de fato o tipo de dados que tá sendo enviado, independente  do nome ter sito alterado ou não
        $extensao = mime_content_type($tipo);
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

        // ver array de tipos existe a extensao do arquivo
        if (in_array($extensao, $tipos_permitidos)) {

            $pasta = "../fotos/";                      // pasta onde vamos guardar
            $temporario = $_FILES['foto']['tmp_name']; // nome original do arquivo
            $novo_nome = uniqid().".$ext";             // novo nome do arquivo

            // fazer o upload do arquivo
            if(move_uploaded_file($temporario, $pasta.$novo_nome)) {
                $foto = $novo_nome;
                // echo "<p>Upload realizado! $foto</p>";
            } // fim fazer upload

        } else {
            // echo "<p>Tipo do arquivo não é permitido.</p>";
            $foto = $_SESSION['foto'];                 // manter a foto anterior
            $_SESSION['msg_upload'] = "Foto em formato $extensao inválido";
        } // fim if array
        // FIM UPLOAD DA FOTO

    } else {
        $foto = $_SESSION['foto']; // manter a foto anterior
        $_SESSION['msg_upload'] = "Foto não foi modificada";

    } // fim do if foto nao nula
