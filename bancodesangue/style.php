<?php

header("Content-Type: text/css");

$corFundo = "#f4f6f8";        // fundo da página
$corTexto = "#2c3e50";        // cor do texto
$corPrimaria = "#3498db";      // cor principal / botões / cabeçalho
$corTabela = "#2980b9";       // cabeçalho das tabelas
$corLinhaPar = "#ecf0f1";     // linhas pares da tabela
?>

/*  Corpo da página  */
body {
    background-color: <?= $corFundo ?>;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: <?= $corTexto ?>;
    line-height: 1.6;
    padding: 20px;
}

/*  Títulos  */
h1, h2 {
    text-align: center;
    color: <?= $corTexto ?>;
    margin-bottom: 20px;
}

/*  Formulários  */
form {
    background-color: #fff;
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

input[type="text"],
input[type="email"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button,
input[type="submit"] {
    background-color: <?= $corPrimaria ?>;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover,
input[type="submit"]:hover {
    background-color: <?= $corTabela ?>;
}

/* Tabelas */
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: <?= $corTabela ?>;
    color: #fff;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: <?= $corLinhaPar ?>;
}

/* Links  */
a {
    display: inline-block;
    margin-top: 10px;
    color: <?= $corPrimaria ?>;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
