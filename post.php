<?php
    include "conexao.php";
function post($i){
    $conn = conexao();
    $sql = "SELECT duvida FROM post WHERE id = $i";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Converta os resultados em um array associativo
    $resultArray = [];
    while ($row = $result->fetch_assoc()) {
        $resultArray[] = $row;
    }
    // Imprima os resultados
    foreach ($resultArray as $row) {
        
        echo "<span style='display: none;'>".$row["duvida"]."</span>";
    }


    $stmt->close();
    $conn->close();
    return $row["duvida"];
}
?>
