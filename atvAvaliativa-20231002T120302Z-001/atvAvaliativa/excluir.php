<? php
function excluirPessoa($conexao, $id) {
    $sql = "DELETE FROM pessoas WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt -> execute();
}
?>
