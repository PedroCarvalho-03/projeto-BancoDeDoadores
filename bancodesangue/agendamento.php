<?php
require_once "conexao.php";

// Buscar todos os doadores para o select
$sql = "SELECT id, nome, tipo_sanguineo FROM doador";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamento de Doação</title>
    <link rel="stylesheet" type="text/css" href="style.php">
</head>
<body>
    <h2>Agendar Doação</h2>

    <form action="salvar_agendamento.php" method="POST">
        <label for="doador_id">Selecione seu nome:</label><br>
        <select name="doador_id" required>
            <option value="">-- Escolha --</option>
            <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>">
                    <?= $row['nome'] ?> (<?= $row['tipo_sanguineo'] ?>)
                </option>
            <?php } ?>
        </select><br><br>

        <label for="data_agendamento">Data do Agendamento:</label><br>
        <input type="date" name="data_agendamento" required><br><br>

        <button type="submit">Agendar</button>
    </form>

    <br>
    <a href="painel.php">Ver Painel Administrativo</a>
</body>
</html>
