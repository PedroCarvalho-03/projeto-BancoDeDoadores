<?php
require_once "conexao.php";

$sql = "SELECT tipo_sanguineo, quantidade FROM estoque";
$result = $conn->query($sql);

echo"<h2>Estoque de Sangue(Quantidade de Doadores)</h2>";
if($result->num_rows > 0){
    echo "<table border='1'><tr><th>Tipo</th><th>Quantidade</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['tipo_sanguineo']."</td><td>".$row['quantidade']."</td></tr>";
        
    }
    echo "</table>";
} else {
    echo "Nenhum dado encontrado.";
}

$conn->close();
?>