<?php
    // =============================== //
    // | Autor   : Anderson Oliveira | //
    // | Data    : 26/11/2021        | //
    // =============================== //

    // Conexão com o banco de dados //
    require_once "../database/conectar.php";

    // Query para inserir dados vindo do formulario de cadastro //
    $sql = "insert into produtos(produto, preco, data_cadastro, validade, quantidade, descricao) 
            values('{$_POST['produto']}', '{$_POST['preco']}', '{$_POST['data_cadastro']}', '{$_POST['validade']}', 
            '{$_POST['quantidade']}', '{$_POST['descricao']}');";

    if (!pg_query($conect, $sql)) {
        pg_errormessage("Não foi possivel fazer o cadastro!");
    } else {
        header("location:../index.php");
    }
?>