<?php
session_start();
require_once "../conexao.php";

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Exemplo: autenticação simples pelo email do doador
    $sql = "SELECT id, nome FROM doador WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Aqui você pode validar a senha se tiver esse campo no banco
        $_SESSION['usuario'] = $result->fetch_assoc();
        header("Location: agendamento.php");
        exit();
    } else {
        $erro = "E-mail ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login do Usuário</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h2>Login do Usuário</h2>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="post">
        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
