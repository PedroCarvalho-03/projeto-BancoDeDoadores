<?php
require_once "../conexao.php";

// Definir filtroCPF para pesquisa
$filtroCPF = '';
if (isset($_GET['cpf_pesquisa'])) {
    $filtroCPF = $_GET['cpf_pesquisa'];
}

// Processa cadastro de doador
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['novo_doador'])) {
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $email = $_POST['email'] ?? '';
    $tipo_sanguineo = $_POST['tipo_sanguineo'] ?? '';

    if ($nome && $cpf && $data_nascimento && $email && $tipo_sanguineo) {
        // Verifica se o CPF já existe
        $sqlCheck = "SELECT id FROM doador WHERE CPF = '$cpf'";
        $resCheck = $conn->query($sqlCheck);
        if ($resCheck && $resCheck->num_rows > 0) {
            $msg = "Já existe um doador cadastrado com esse CPF.";
        } else {
            $sql = "INSERT INTO doador (nome, CPF, data_nascimento, email, tipo_sanguineo) VALUES ('$nome', '$cpf', '$data_nascimento', '$email', '$tipo_sanguineo')";
            if ($conn->query($sql) === TRUE) {
                // Atualiza estoque automaticamente
                $sqlEstoque = "UPDATE estoque SET quantidade = quantidade + 1 WHERE tipo_sanguineo = '$tipo_sanguineo'";
                $conn->query($sqlEstoque);
                $msg = "Doador cadastrado com sucesso! Estoque atualizado.";
            } else {
                $msg = "Erro ao cadastrar doador: " . $conn->error;
            }
        }
    } else {
        $msg = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
  <link rel="stylesheet" href="../css/style.css">



</head>
<body>


    <h1>Painel de Controle</h1>



    <!-- Doadores cadastrados -->
    <h2>📋 Doadores Cadastrados</h2>
    <table>
            <!-- Barra de pesquisa por CPF -->
            <form method="get" style="margin-bottom: 20px; display: flex; gap: 10px; align-items: center; max-width: 400px;">
                <input type="text" name="cpf_pesquisa" placeholder="Buscar por CPF" value="<?= htmlspecialchars($filtroCPF) ?>" style="flex:1; padding:10px; border-radius:5px; border:1px solid #ccc;">
                <button type="submit" class="botao">Pesquisar</button>
            </form>

            <!-- Formulário retrátil para cadastro de doador -->
            <button class="botao" onclick="document.getElementById('formDoador').classList.toggle('show')">+ Cadastrar Novo Doador</button>
            <div id="formDoador" style="display:none; margin-bottom:30px; max-width:400px; margin-left:auto; margin-right:auto;">
                <?php if (isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
                <form method="post">
                    <input type="hidden" name="novo_doador" value="1">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" required maxlength="11" pattern="\d{11}" title="Digite apenas números">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>
                    <label for="tipo_sanguineo">Tipo Sanguíneo:</label>
                    <select name="tipo_sanguineo" id="tipo_sanguineo" required>
                        <option value="">Selecione</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <button type="submit" class="botao" style="margin-top:15px;">Cadastrar Doador</button>
                </form>
            </div>
        <?php
            // Exibe a lista de doadores (com filtro por CPF se aplicável)
            $sql = "SELECT * FROM doador";
            if (!empty($filtroCPF)) {
                $sql .= " WHERE CPF LIKE '%$filtroCPF%'";
            }
            $resultado = $conn->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['tipo_sanguineo']}</td>
                            <td>{$row['CPF']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum doador cadastrado</td></tr>";
            }
        ?>
    </table>

    <!-- Estoque de sangue -->
    <h2 id="btnEstoque" style="cursor:pointer; user-select:none;">🩸 Estoque de Sangue</h2>
    <div id="estoqueBox" style="display:none;">
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
    </div>

    <!-- Agendamentos -->
    <h2 id="btnAgendamentos" style="cursor:pointer; user-select:none;">📅 Agendamentos</h2>
    <div id="agendamentosBox" style="display:none;">
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
    </div>

    <script>
        // Retrátil Estoque
        document.getElementById('btnEstoque').onclick = function() {
            var box = document.getElementById('estoqueBox');
            box.style.display = box.style.display === 'none' ? 'block' : 'none';
        };
        // Retrátil Agendamentos
        document.getElementById('btnAgendamentos').onclick = function() {
            var box = document.getElementById('agendamentosBox');
            box.style.display = box.style.display === 'none' ? 'block' : 'none';
        };
    </script>
</body>
</html>
