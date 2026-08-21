<?php
include "db.php";

$sql = "SELECT * FROM unidade";
$result = $conn->query($sql);

    if ($result->num_rows > 0){

        echo " <h2>unidades:</h2> ";
        echo "<table border = '1' cellpadding = '8' cellspacing = '0'>
        
        <tr>       
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        </tr>";
    
    
   while ($row = $result->fetch_assoc()){

    echo "<tr>

    <td>{$row['id']}</td>
    <td>{$row['nome']}</td>
    <td>{$row['descricao']}</td>

    </tr>";

   }

 echo "</table>";

    }else{
    echo "<p>Nenhuma unidade existe </p>";
    }





$sql = "SELECT * FROM funcionario";
$result = $conn->query($sql);

    if ($result->num_rows > 0){

        echo " <h2>Funcionários:</h2> ";
        echo "<table border = '1' cellpadding = '8' cellspacing = '0'>
        

        
        <tr>       
        
        <th>Nome</th>
        <th>Idade</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Cargo</th>
    
        </tr>";
    
    
   while ($row = $result->fetch_assoc()){

    echo "<tr>

    
    <td>{$row['nome']}</td>
    <td>{$row['idade']}</td>
    <td>{$row['cpf']}</td>
    <td>{$row['telefone']}</td>
    <td>{$row['cargo']}</td>

    </tr>";

   }

 echo "</table>";

    }else{
    echo "<p>Nenhum funcionário existe existe </p>";
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
    
</body>
</html>




