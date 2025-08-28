<?php
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
    <link rel="stylesheet" type="text/css" href="style.php">

</head>
<body>

    <h1>Painel de Controle</h1>

    <!-- Doadores cadastrados -->
    <h2>📋 Doadores Cadastrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo Sanguíneo</th>
        </tr>
        <?php
        $sql = "SELECT * FROM doador";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['tipo_sanguineo']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum doador cadastrado</td></tr>";
        }
        ?>
    </table>

    <!-- Estoque de sangue -->
    <h2>🩸 Estoque de Sangue</h2>
    <table>
        <tr>
            <th>Tipo Sanguíneo</th>
            <th>Quantidade (bolsas)</th>
        </tr>
        <?php
        $sql = "SELECT * FROM estoque";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['tipo_sanguineo']}</td>
                        <td>{$row['quantidade']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Estoque vazio</td></tr>";
        }
        ?>
    </table>

    <!-- Agendamentos -->
    <h2>📅 Agendamentos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>data_agendamento</th>
            <th>Hora</th>
        </tr>
        <?php
        $sql = "SELECT a.id, d.nome, a.data_agendamento, a.hora 
        FROM agendamentos a
        JOIN doador d ON a.doador_id = d.id";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['data_agendamento']}</td>
                        <td>{$row['hora']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum agendamento feito</td></tr>";
        }
        ?>
    </table>

</body>
</html>
