    
    <?php
    include 'funcoes.php';
    $conexao = conectar();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listar pessoas por nome</title>
    </head>
    <body>
        <a href="index.html">Voltar</a>
        <br>
        <?php
        $nome = $_POST['nome'];      
        $retornodafuncaoinserida = listarPorNomePesquisado($conexao, $nome);
        $conexao = null;

        if ($retornodafuncaoinserida == true) {
            echo("Listado os dados corretamente!");
        }else{
            echo("Não foi possivel listar os dados.");
        }
        ?>
    </body>
    </html>
