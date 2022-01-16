<?php
    // =============================== //
    // | Autor   : Anderson Oliveira | //
    // | Data    : 26/11/2021        | //
    // =============================== //

    // Conexão com o banco de dados //
    require_once "../database/conectar.php";
    date_default_timezone_set("America/Sao_Paulo");

    $sql_atualizar = "select id_produto, produto, preco, data_cadastro, validade, quantidade, descricao 
                      from produtos where id_produto = {$_GET['id_at']}";
                      
    $query = pg_query($conect, $sql_atualizar);

    if (isset($_GET['id_at'])) {
        if ($query) {
            $at_linha = pg_fetch_assoc($query);
        }
    } else {
        header("location:../index.php");
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atualizar dados</title>

        <!-- css bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css principal -->
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <!-- start: body -->
    <body>
        <!-- start: container  -->
        <div class="container">
            <h1>Atualizar Dados</h1>
            <!-- start: form -->
            <form action="processa_atualizar.php?id=<?=$at_linha['id_produto']?>" method="POST">

                <!-- start: inputs -->
                <div class="mb-3">
                    <label class="form-label">Produto</label>
                    <input type="text" class="form-control" name="produto" placeholder="Ex: Bolacha" value="<?=$at_linha['produto']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="text" class="form-control" name="preco" placeholder="Ex: R$0.00" value="<?=$at_linha['preco']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Data cadastro</label>
                    <input type="text" class="form-control" maxlength="10" name="data_cadastro" value="<?=date("d/m/Y")?>" value="<?=$at_linha['data_cadastro']?>">
                </div>
               
                <div class="mb-3">
                    <label class="form-label">Validade</label>
                    <input type="text" class="form-control validade" maxlength="10" name="validade" placeholder="Ex: 00/00/0000" value="<?=$at_linha['validade']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" placeholder="Ex: 400" value="<?=$at_linha['quantidade']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Ex: limpeza" value="<?=$at_linha['descricao']?>">
                </div>
                <!-- end: inputs -->

                <button type="submit" class="btn btn-primary btn_atualizar">Atualizar</button>
            </form>
            <!-- end: form -->    
        </div>
        <!-- end: container -->

        <!-- scripts js -->
        <script src="../javascript/script.js"></script>
    </body>
    <!-- end: body -->
</html>