    
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
        <title>Excluir pessoas</title>
    </head>
    <body>
        <a href="index.html">Voltar</a>
        <br>
        <?php
        $id = $_POST['id'];
        listarPessoas($conexao);
        
        $retornodafuncaoinserida = excluirPessoa($conexao, $id);
        $conexao = null;
        if ($retornodafuncaoinserida == true) {
            echo("Excluído os dados corretamente!");
        }else{
            echo("Não foi possivel excluir os dados.");
        }
        ?>
    </body>
    </html>
