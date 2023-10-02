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
        <title>Inserir pessoas</title>
    </head>
    <body>
        <a href="index.html">Voltar</a>
        <br>
        <?php
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $idade = $_POST['idade'];
        $retornodafuncaoinserida = inserirPessoa($conexao, $nome, $sobrenome, $rua, $numero, $idade);
        $conexao = null;
        if ($retornodafuncaoinserida == true) {
            echo("Inserido os dados corretamente!");
        }else{
            echo("Não foi possivel inserir os dados.");
        }
        
        ?>
    </body>
