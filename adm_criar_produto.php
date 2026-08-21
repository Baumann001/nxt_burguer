<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $stmt_insert = $conn->prepare(
        "INSERT INTO produtos (nome, preco, categoria) VALUES (?, ?, ?)"
    );

    $stmt_insert->bind_param("sds", $nome, $preco, $categoria);

    if ($stmt_insert->execute()) {
        echo "<p style='color: green;'>Cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color: red;'>Erro ao cadastrar no sistema: "
             . $stmt_insert->error . "</p>";
    }

    $stmt_insert->close();
}

$conn->close();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

<form action="adm_criar_produto.php" method="post">





</form>
    
</body>
</html>