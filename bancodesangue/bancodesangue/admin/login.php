<?php
session_start();

$usuario_admin = "admin@admin";
$senha_admin = "123456";

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    if ($_POST['usuario'] === $usuario_admin && $_POST['senha'] === $senha_admin) {
        $_SESSION['admin'] = true;
        header("Location: painel.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos.";
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
    <label for="usuario">Usuário:</label>
    <input type="text" name="usuario" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <button class="botao" type="submit">Entrar</button>
    </form>
</body>
</html>
