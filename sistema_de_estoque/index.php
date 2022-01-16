<!DOCTYPE html>

<!-- conexao com o banco de dados -->
<?php
    require_once "database/conectar.php";
    date_default_timezone_set("America/Sao_Paulo");
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar</title>

        <!-- css bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css principal -->
        <link rel="stylesheet" href="css/style.css">

    </head>
    <!-- start: body -->
    <body>
        <!-- start: container  -->
        <div class="container">
            <h1>Estoque de Mercado</h1>
            <!-- start: form -->
            <form action="pages/inserir.php" method="POST">

                <!-- start: inputs -->
                <div class="mb-3">
                    <label class="form-label">Produto</label>
                    <input type="text" class="form-control" name="produto" placeholder="Ex: Bolacha">
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="text" class="form-control" name="preco" placeholder="Ex: R$0.00">
                </div>

                <div class="mb-3">
                    <label class="form-label">Data cadastro</label>
                    <input type="text" class="form-control" maxlength="10" name="data_cadastro" value="<?=date("d/m/Y")?>">
                </div>
               
                <div class="mb-3">
                    <label class="form-label">Validade</label>
                    <input type="text" class="form-control validade" maxlength="10" name="validade" placeholder="Ex: 00/00/0000">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" placeholder="Ex: 400">
                </div>


                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Ex: limpeza">
                </div>
                <!-- end: inputs -->

                <button type="submit" class="btn btn-primary btn_cadastrar">Cadastrar</button>
            </form>
            <!-- end: form -->    
        </div>
        <!-- end: container -->

        <div class="containar-table">
            <!-- start: table -->
            <table class="table">
                <thead class="table_head">
                    <!-- cabecalho da tabela de dados -->
                    <tr>
                        <th scode="col">Editar</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Data-cadastro</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Descricao</th>
                        <th scode="col">Deletar</th>
                    </tr>
                </thead>
                <!-- start: tbody -->
                <tbody>
                    <!-- codigo para popular a tabela com os dados do banco -->
                    <?php
                        $sql_consultar = 'select * from produtos;';
                        $qtd_produtos = 0;

                        $consulta = pg_query($conect, $sql_consultar);
                    
                        while ($linha = pg_fetch_assoc($consulta)) {
                            $qtd_produtos++;

                            print "<tr style='text-align: center;'>";
                                print "<td><a class='editar' href='pages/atualizar.php?id_at={$linha['id_produto']}'>Editar</a></td>";
                                print "<td>{$linha['produto']}</td>";
                                print "<td>R$ {$linha['preco']}</td>";
                                print "<td>{$linha['data_cadastro']}</td>";
                                print "<td>{$linha['validade']}</td>";
                                print "<td>{$linha['quantidade']}</td>";
                                print "<td>{$linha['descricao']}</td>";
                                print "<td><a href='pages/deletar.php?id={$linha['id_produto']}' class='deletar'>Deletar</a></td>";
                            print "</tr>";
                        } 

                        print "<p><strong>Total de produtos cadastrados: {$qtd_produtos}</strong></p>";
                    ?>
                </tbody>
                <!-- end: tbody -->
            </table>
            <!-- end: table -->
        </div>

        <!-- scripts js -->
        <script src="javascript/script.js"></script>
    </body>
    <!-- end: body -->
</html>