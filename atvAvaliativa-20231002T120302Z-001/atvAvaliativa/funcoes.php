<?php
// conect
function conectar() : object {
    $bd = "rb";
    $username = "root";
    $password = "";
    $conect = new PDO ("mysql:host=localhost;dbname=$bd",$username, $password);
    return $conect;
}

// listar pessoas
function  listarPessoas(object $conexao) : void {
    $sql = "SELECT * FROM pessoa";
    $stmt = $conexao->prepare($sql);
    if($stmt->execute()){
        echo "<table border='1'>";
        echo "<th>ID</th><th>Nome</th><th>Sobrenome</th><th>Rua</th><th>Número</th><th>Idade</th>";
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo print_r($row);
            echo "<tr>";
            echo "<td>".$row['idPessoa']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['sobrenome']."</td>";
            echo "<td>".$row['rua']."</td>";
            echo "<td>".$row['numero']."</td>";
            echo "<td>".$row['idade']."</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }else{
        echo "erro!";
    }
    return;
}
function inserirPessoa(object $conexao, String $nome, String $sobrenome, String $rua, int $numero, int $idade):bool {
    $sql = "INSERT INTO pessoa (nome, sobrenome, rua, numero, idade) VALUES(?,?,?,?,?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(1,$nome,PDO::PARAM_STR);
    $stmt->bindParam(2,$sobrenome,PDO::PARAM_STR);
    $stmt->bindParam(3,$rua,PDO::PARAM_STR);
    $stmt->bindParam(4,$numero,PDO::PARAM_INT);
    $stmt->bindParam(5,$idade,PDO::PARAM_INT);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

// excluir
function excluirPessoa($conexao, $id) {
    $sql = "DELETE FROM pessoa WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt -> execute();
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
