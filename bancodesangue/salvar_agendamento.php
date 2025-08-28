<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $data_agendamento = $_POST["data_agendamento"];

    // Inserir no banco corretamente
    $sql = "INSERT INTO agendamentos (doador_id, data_agendamento, hora)
            VALUES ('$doador_id', '$data_agendamento', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para o painel
        header("Location: painel.php");
        exit();
    } else {
        echo "Erro ao salvar agendamento: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" type="text/css" href="style.php">
</head>
<body>

</body>
</html>