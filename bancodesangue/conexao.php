<?php
$host = "localhost";   // servidor
$user = "root";        // usuário padrão do XAMPP
$pass = "";            // senha padrão do XAMPP (geralmente vazio)
$db   = "doador";      // nome do banco que você criou

// Criar conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$conn->set_charset("utf8"); // charset
?>
