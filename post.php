<?php
    include "conexao.php";
function post($i){
    if($i == 1){
        $conn = conexao();        
        $sql = "SELECT duvida FROM post";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    }else{
        $conn = conexao();        
        $sql = "SELECT duvida FROM post WHERE id = $i";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    }
   

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

function data($i){
    if($i == 1){
        $conn = conexao();        
        $sql = "SELECT data FROM post";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $row['data'];
    } else {
        $conn = conexao();        
        $sql = "SELECT data FROM post WHERE id = $i";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['data'];
    }
}

function hora($i){
    if($i == 1){
        $conn = conexao();        
        $sql = "SELECT hora FROM post";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['hora'];
    } else {
        $conn = conexao();        
        $sql = "SELECT hora FROM post WHERE id = $i";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['hora'];
    }
}



?>
