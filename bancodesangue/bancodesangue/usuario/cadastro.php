<?php
// importa a conexão
require_once('../conexao.php');

$conn->close();
?>

<!DOCTYPE html>
?>
<head>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Doadores</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Banco Vida 🩸</h1>
        <p>Doe sangue, salve vidas</p>
    </header>
    <h2>Cadastro de Doadores:</h2>
    <form action="inserir.php" method="post">
        Nome: <input type="text" name="nome" required><br>
        CPF: <input type="text" name="cpf" required maxlength="11" pattern="\d{11}" title="Digite 11 números">
        Data de Nascimento: <input type="date" name="data_nascimento" required
        min="1900-01-01" max="<?= date('Y-m-d', strtotime('-18 years')) ?>">
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        Tipo Sanguíneo:
        <select name="tipo_sanguineo" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br>
        <input type="submit" value="Cadastrar">
    </form>
    <footer>
        <div class="links">
            <p><a href="cadastro.php">Área do Doador</a></p>
            <p><a href="../admin/login.php">Área do Administrador</a></p>
        </div>
        <p>© 2025 Banco Vida - Todos os direitos reservados</p>
    </footer>
</body>
</html>
        Nome: <input type="text" name="nome" required><br>
        CPF: <input type="text" name="cpf" required maxlength="11" pattern="\d{11}" title="Digite 11 números">
        Data de Nascimento: <input type="date" name="data_nascimento" required
        min="1900-01-01" max="<?= date('Y-m-d', strtotime('-18 years')) ?>">
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        Tipo Sanguíneo:
        <select name="tipo_sanguineo" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>