<?php
include "db.php"

 if ($_SERVER['REQUEST_METHOD'] === 'POST'){

 $nome = $_POST['nome'];
 $preco = $_POST['preco'];
 $categoria = $_POST['categoria'];

$stmt_insert = $conn->prepare

}

?>