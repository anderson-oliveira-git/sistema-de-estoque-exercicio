<?php
    // =============================== //
    // | Autor   : Anderson Oliveira | //
    // | Data    : 26/11/2021        | //
    // =============================== //

    // string para conexão com o banco de dados //
    $conection = "host=localhost dbname=mercado user=postgres password=database3301";

    $conect = pg_connect($conection) or 
    die("Não foi possivel se conectar ao banco de dados!");
    
?>