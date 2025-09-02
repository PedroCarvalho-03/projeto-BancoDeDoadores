<?php
require_once "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];
    $tipo_sanguineo = $_POST["tipo_sanguineo"];

    $sql = "INSERT INTO doadores (nome, cpf, nascimento, tipo_sanguineo) 
            VALUES ('$nome', '$cpf', '$nascimento', '$tipo_sanguineo')";

    if ($conn->query($sql) === TRUE) {
        $doador_id = $conn->insert_id;
        header("Location: agendamento.php?doador_id=$doador_id");
        exit();
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }
}
$conn->close();
?>
