<?php
require_once "../conexao.php";

if (isset($_GET['doador_id'])) {
    $doador_id = $_GET['doador_id'];
    $sql = "SELECT d.nome, a.data_agendamento 
            FROM doadores d 
            JOIN agendamentos a ON d.id = a.doador_id 
            WHERE d.id = $doador_id 
            ORDER BY a.id DESC LIMIT 1";

    $result = $conn->query($sql);
    $dados = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
    <link rel="stylesheet" href="../style.php">
</head>
<body>
    <?php if ($dados): ?>
        <h2>Obrigado, <?php echo $dados['nome']; ?>!</h2>
        <p>Seu agendamento foi realizado para o dia 
           <strong><?php echo date("d/m/Y", strtotime($dados['data_agendamento'])); ?></strong>.
        </p>
    <?php else: ?>
        <p>Agendamento não encontrado.</p>
    <?php endif; ?>
</body>
</html>
