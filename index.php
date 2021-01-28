<?php
include_once "connect.php";

try{
    $table = $connect->query("SELECT * FROM data");
    echo "<table border = '1'><tr>
        <td>Nome</td>
        <td>Motorista</td>
        <td>Placa do Veiculo</td>
        <td>A&ccedil&otildees</td></tr>";
    while($line = $table->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
        <td>$line[nome]</td>
        <td>$line[motorista]</td>
        <td>$line[placa]</td>
        <td><a href = 'excludeRoute.php?id=$line[id]'>Excluir</a></td></tr>";
    }
    echo "</table>";

    echo "<a href = 'formReadXml.php'>Cadastrar xml</a>";
    
}catch(PDOException $e){
    echo $e->getMessage();
}