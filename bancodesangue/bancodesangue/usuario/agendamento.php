<?php
session_start();
require_once "../conexao.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamento de Doação</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Agendar Doação</h2>

    <form action="salvar_agendamento.php" method="POST">
        <input type="hidden" name="doador_id" value="<?= $_SESSION['usuario']['id'] ?>">
        <label for="data_agendamento">Data do Agendamento:</label><br>
        <input type="date" name="data_agendamento" required><br><br>
        <label for="hora_agendamento">Horário do Agendamento:</label><br>
        <input type="time" name="hora_agendamento" required><br><br>
        <button type="submit">Agendar</button>
    </form>

    <br>
</body>
</html>
