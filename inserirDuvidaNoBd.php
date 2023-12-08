<?php
    include "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=dubium", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $conteudo = $_POST['duvida'];

            $dataAtual = date("Y-m-d ");
            $horaAtual = date("H:i:s");

            $stmt = $pdo->prepare('INSERT INTO post (data, hora, duvida) VALUES (?, ?,?)');
            echo ($conteudo."|". $dataAtual ."|". $horaAtual);
            $stmt->execute([$dataAtual, $horaAtual, $conteudo]);

            header('Location: indexLigth.php');
            exit();
        }catch(PDOException $e){
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
        }
    }
?>
;