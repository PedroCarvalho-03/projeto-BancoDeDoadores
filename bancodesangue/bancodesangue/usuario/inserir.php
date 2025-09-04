<?php
require_once "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    $email = $_POST["email"];
    $tipo_sanguineo = $_POST["tipo_sanguineo"];

    $sql = "INSERT INTO doador (nome, CPF, data_nascimento, email, tipo_sanguineo)
            VALUES ('$nome', '$cpf', '$data_nascimento', '$email', '$tipo_sanguineo')";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de agendamento
        header("Location: agendamento.php");
        exit(); // sempre colocar exit após header
    } else {
        echo "Erro ao inserir doador: " . $conn->error;
    }

} else {
    echo "Acesso inválido à página.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="text/css" href="style.php">
</head>
<body>
    <h2>Cadastro de Doador</h2>
</body>
</html>