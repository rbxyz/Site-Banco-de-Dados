<? php
function inserirPessoa($conexao, $nome, $sobrenome, $rua, $numero, $idade) {
    $sql = "INSERT INTO pessoas (nome, sobrenome, rua, numero, idade) VALUES (:nome, :sobrenome, :rua, :numero, :idade)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
    $stmt->bindParam(":rua", $rua, PDO::PARAM_STR);
    $stmt->bindParam(":numero", $numero, PDO::PARAM_INT);
    $stmt->bindParam(":idade", $idade, PDO::PARAM_INT);
    return $stmt->execute();
}
?>