<?php
require_once "../conexao.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $data_agendamento = $_POST["data_agendamento"];
    $hora_agendamento = $_POST["hora_agendamento"];

    // Inserir no banco corretamente
    $sql = "INSERT INTO agendamentos (doador_id, data_agendamento, hora)
            VALUES ('$doador_id', '$data_agendamento', '$hora_agendamento')";

    if ($conn->query($sql) === TRUE) {
        // Atualiza estoque automaticamente
        $sqlTipo = "SELECT tipo_sanguineo FROM doador WHERE id = '$doador_id'";
        $resTipo = $conn->query($sqlTipo);
        if ($resTipo && $resTipo->num_rows > 0) {
            $tipo = $resTipo->fetch_assoc()['tipo_sanguineo'];
            $sqlEstoque = "UPDATE estoque SET quantidade = quantidade + 1 WHERE tipo_sanguineo = '$tipo'";
            $conn->query($sqlEstoque);
        }
        // Redireciona para página de sucesso
        header("Location: agendamento_sucesso.php");
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