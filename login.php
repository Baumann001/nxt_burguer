<?php
include 'db.php';

session_start();

// 1) Logout
if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
}

// 2) Login
$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cpf = trim($_POST["cpf"] ?? "");
    $senha = trim($_POST["senha"] ?? "");

    // Busca o usuário pelo CPF para conferir a senha
    $stmt = $conn->prepare("SELECT cpf, nome, senha FROM funcionario WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    // Valida se o usuário existe e se a senha confere (suporta hash ou texto puro)
    if ($dados && (password_verify($senha, $dados["senha"]) || $senha === $dados["senha"])) {
        // Previne ataques de fixação de sessão
        session_regenerate_id(true);

        $_SESSION["cpf"] = $dados["cpf"];
        $_SESSION["nome"] = $dados["nome"] ?? "";

        header("Location: adm_gerenciar.php");
        exit;
    } else {
        $msg = "CPF ou senha incorretos!";
    }
}
?>
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
        
        <form action="login.php" method="POST" class="formulario">
            

                <h2>Login</h2>

               
                <label>CPF (apenas números):</label><br>
                <input type="text" name="cpf" maxlength="11" class="input-formulario" placeholder="CPF:" required><br><br>
    
                <label>Senha:</label><br>
                <input type="password" name="senha" class="input-formulario" placeholder="Senha:" required><br><br>
    
                <button type="submit">Login</button>
    
            
        </form>

    </body>
</html>