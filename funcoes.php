<?php
// conect
function conectar() {
    $sql = "";
    $username = "rb";
    $password = "admin";
}

// listar pessoas
function listarPessoas($conexao) {
    $sql = "SELECT * FROM pessoas";
    $stmt = $conexao->prepare($sql);    $stmt->execute();

}

// excluir
function excluirPessoa($conexao, $id) {
    $sql = "DELETE FROM pessoas WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt -> execute();
}
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

// pessoa nome pesquisado
function listarPorNomePesquisado($conexao, $aux) {
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :aux";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":aux", "%$aux%", PDO::PARAM_STR);
    $stmt->execute();
}

// maiores de idade
function listarPessoasMaioresIdade($conexao) {
    $sql = "SELECT * FROM pessoas WHERE idade >= 18";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
}

// somaidades
function somarIdadesPessoas($conexao) {
    $sql = "SELECT SUM(idade) as soma_idades FROM pessoas";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['soma_idades'];
}

// soma
function mostrarSomaIdadesPessoas($auxIdade) {
    echo "A soma das idades das pessoas é: $auxIdade";
}

// aletrrar pessoa
function alterarPessoa($conexao, $nome, $rua, $idPessoa, $auxNumero, $auxSobrenome, $auxIdade) {
    $sql = "UPDATE pessoas SET nome = :nome, rua = :rua, numero = :numero, sobrenome = :sobrenome, idade = :idade WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":rua", $rua, PDO::PARAM_STR);
    $stmt->bindParam(":numero", $auxNumero, PDO::PARAM_INT);
    $stmt->bindParam(":sobrenome", $auxSobrenome, PDO::PARAM_STR);
    $stmt->bindParam(":idade", $auxIdade, PDO::PARAM_INT);
    $stmt->bindParam(":id", $idPessoa, PDO::PARAM_INT);
    return $stmt->execute();
}

?>
