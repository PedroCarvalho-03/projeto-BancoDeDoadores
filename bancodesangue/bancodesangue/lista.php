<?php
require_once "conexao.php";

$sql = "SELECT * FROM doador";
$result = $conn->query($sql);

echo "<h2>Lista de Doadores:</h2>";

if ($result->num_rows > 0) {
   echo "<table border='1'>
   <tr><th>Nome</th><th>CPF</th><th>Email</th><th>Tipo</th></tr>";
   while($row = $result->fetch_assoc()) {
       echo "<tr>
           <td>" . $row["nome"] . "</td>
           <td>" . $row["cpf"] . "</td>
           <td>" . $row["email"] . "</td>
           <td>" . $row["tipo_sanguineo"] . "</td>
       </tr>";
   }
   echo "</table>";
} else {
   echo "Nenhum doador cadastrado.";
}

$conn->close();
?>