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

$conn->close();

  
?>





