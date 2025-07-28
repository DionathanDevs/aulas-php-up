<?php

require_once 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['nome'] == ' ')
    $nome = $_POST['nome'];
    $senha = $_POST['senha']; 

    $sql = "INSERT INTO user (nome, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acesso inválido!";
}
?>
?>