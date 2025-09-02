<?php
require_once "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $data_agendamento = $_POST["data_agendamento"];

    $sql = "INSERT INTO agendamentos (doador_id, data_agendamento, hora)
            VALUES ('$doador_id', '$data_agendamento', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: confirmacao.php?doador_id=$doador_id");
        exit();
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>
