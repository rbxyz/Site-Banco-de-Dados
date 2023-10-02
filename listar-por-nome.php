<? php
function listarPorNomePesquisado($conexao, $aux) {
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :aux";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":aux", "%$aux%", PDO::PARAM_STR);
    $stmt->execute();
}
?>