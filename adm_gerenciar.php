<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt_select = $conn->prepare("SELECT * FROM unidade");
    $stmt_select->execute();

    $result = $stmt_select->get_result();

    while ($unidade = $result->fetch_assoc()) {
        echo $unidade['nome'];
    }
}
?>