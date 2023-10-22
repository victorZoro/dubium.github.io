<?php
    include "conexao.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        $conn = conexao();
        $duvida = $_POST["duvida"];
        $sql = "INSERT INTO post VALUES (null,'2023-06-11','11:30','materia',?)";
        $stmt = $conn ->prepare($sql);
        $stmt->bind_param("s",$duvida);

        if ($stmt->execute($duvida)) {
            echo "Dúvida inserida com sucesso!";
        } else {
            echo "Erro ao inserir a dúvida: " . $stmt->error;
        }

        // Feche a declaração e a conexão
        $stmt->close();
        $conexao->close();
    }
?>
