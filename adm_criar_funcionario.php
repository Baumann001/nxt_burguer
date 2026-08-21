<?php
// Inclui a sua conexão que tem a variável $conn
include "db.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $idade = (int)$_POST['idade']; // Converte para inteiro por segurança
    $cargo = $_POST['cargo'];

    // 1. VERIFICAÇÃO DADOS DUPLICADOS (CPF ou Nome)
    // A ordem dos '?' deve ser rigorosamente a mesma do bind_param
    $stmt_check = $conn->prepare("SELECT nome, cpf FROM usuarios WHERE cpf = ? OR nome = ?");
    $stmt_check->bind_param("ss", $cpf, $nome); // 1º CPF, 2º Nome
    $stmt_check->execute();
    $resultado = $stmt_check->get_result();

    if ($resultado->num_rows > 0) {
        $usuario_existente = $resultado->fetch_assoc();

        if ($usuario_existente['cpf'] === $cpf) {
            echo "<p style='color: red;'>Erro: Este CPF já está cadastrado!</p>";
        } elseif ($usuario_existente['nome'] === $nome) {
            echo "<p style='color: red;'>Erro: Este Nome de usuário já está cadastrado!</p>";
        }
    } else {
        // Cria a senha com hash seguro
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // 2. INSERÇÃO NO BANCO DE DADOS
        $stmt_insert = $conn->prepare("INSERT INTO usuarios (nome, telefone, cargo, cpf, senha, idade) VALUES (?, ?, ?, ?, ?, ?)");
        
        // "sssssi" -> 5 Strings (nome, telefone, cargo, cpf, senha) e 1 Inteiro (idade)
        $stmt_insert->bind_param("sssssi", $nome, $telefone, $cargo, $cpf, $senha_hash, $idade);

        if ($stmt_insert->execute()) {
            echo "<p style='color: green;'>Cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Erro ao cadastrar no sistema: " . $stmt_insert->error . "</p>";
        }
        
        $stmt_insert->close();
    }
    
    $stmt_check->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Simples</title>
        <link rel="stylesheet" href="style_php.css">
    </head>

    <body>


        <div class="logo-container">
            <img src="logo.webp" alt="Logo da empresa" class=logo>
        </div>
        
        <form action="cadastro.php" method="POST" class="formulario">
            

                <h2>Cadastro de Funcionário</h2>

                <label>Nome:</label><br>
                <input type="text" name="nome" class="input-formulario" placeholder="Nome:"><br><br>
    
                <label>E-mail:</label><br>
                <input type="email" name="email" class="input-formulario" placeholder="Email:" required><br><br>
    
                <label>CPF (apenas números):</label><br>
                <input type="text" name="cpf" maxlength="11" class="input-formulario" placeholder="CPF:" required><br><br>
    
                <label>Senha:</label><br>
                <input type="password" name="senha" class="input-formulario" placeholder="Senha:" required><br><br>
    
                <label>Telefone:</label><br>
                <input type="text" name="telefone" class="input-formulario" placeholder="Telefone:" required><br><br>
    
                <button type="submit">Cadastrar</button>
    
            
        </form>

    </body>
</html>