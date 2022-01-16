<?php
    // =============================== //
    // | Autor   : Anderson Oliveira | //
    // | Data    : 26/11/2021        | //
    // =============================== //

    // Conexão com o banco de dados //
    require_once "../database/conectar.php";

    $sql_atualizar = "update produtos set produto = '{$_POST['produto']}', preco = '{$_POST['preco']}', 
                      validade = '{$_POST['validade']}', quantidade = '{$_POST['quantidade']}', 
                      descricao = '{$_POST['descricao']}' where id_produto = '{$_GET['id']}'";

    if (isset($_GET['id'])) {
        if (pg_query($conect, $sql_atualizar)) {
            header('location:../index.php');
        } else {
            header("location:../index.php");
        }
    } else {
        header("location:../index.php");
    }
?>