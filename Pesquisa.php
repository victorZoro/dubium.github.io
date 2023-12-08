<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["pesquisa"])) {
        header("location: indexDark.php");
        exit;
    }

    $duvida = "%" . trim($_POST["pesquisa"]) . "%";

    // Estabeleça a conexão com o banco de dados (assumindo que a função conexao() retorna a conexão corretamente)
    $conn = conexao();

    // Prepare a consulta SQL com MySQLi
    $sql = "SELECT duvida FROM post WHERE duvida LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $duvida);
    $stmt->execute();

    
    // Obtenha os resultados
    $result = $stmt->get_result();

    // Converta os resultados em um array associativo
    $resultArray = [];
    while ($row = $result->fetch_assoc()) {
        $resultArray[] = $row;
    }


    // Imprima os resultados
    foreach ($resultArray as $row) {
        echo "<h1>".$row["duvida"] ."</h1><br>";
    }
    //print_r($resultArray);

    // Feche a declaração e a conexão
    $stmt->close();
    $conn->close();

    exit;
} else {
    echo "Método GET não suportado!";
}


?>
