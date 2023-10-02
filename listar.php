
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
        <title>Listar pessoas</title>
    </head>
    <body>
        <a href="index.html">Voltar</a>
        <br>
        
        <?php
        listarPessoas($conexao);
        $conexao = null;
        ?>
    </body>
    </html>
