<?php
    // =============================== //
    // | Autor   : Anderson Oliveira | //
    // | Data    : 26/11/2021        | //
    // =============================== //

    // Conexão com o banco de dados //
    require_once "../database/conectar.php";

    $sql_deletar = "delete from produtos where id_produto = {$_GET['id']};";

    if (!pg_query($conect, $sql_deletar)) {
        print pg_errormessage("Erro ao tentar deletar!");
    } else {
        header("location:../index.php");
    }

?>