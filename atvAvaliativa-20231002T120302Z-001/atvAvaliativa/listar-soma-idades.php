<?php
function somarIdadesPessoas($conexao) {
    $sql = "SELECT SUM(idade) as soma_idades FROM pessoas";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['soma_idades'];
}
?>