
    <?php
    include 'conexao.php'; 
    $conexao = conectar();
    function listarPessoas($conexao) {
        echo "<table border='1'>";
        echo "<h1>ID</h1><h2>Nome</h2><h2>Sobrenome</h2><h2>Rua</h2><h2>Número</h2><h2>Idade</h2></h2>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['sobrenome']."</td>";
            echo "<td>".$row['rua']."</td>";
            echo "<td>".$row['numero']."</td>";
            echo "<td>".$row['idade']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    listarPessoas($conexao);
    $conexao = null;
    ?>