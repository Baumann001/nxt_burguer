<?php

$servername = "localhost";
$username   = "root";
$password   = ""; // Removido o espaço de dentro das aspas
$dbname     = "nxt_burguer";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Define o charset para aceitar acentos e emojis
$conn->set_charset("utf8mb4");