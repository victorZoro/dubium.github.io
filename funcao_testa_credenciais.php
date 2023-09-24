<?php
include "conexao.php";

function validaCredenciais()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $conn = conexao();
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        // Consulta SQL
        $sql = "SELECT * FROM tabelaLogin WHERE cpf = ? AND senha = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $cpf, $senha);
        $stmt->execute();

        // Verifique se há uma correspondência
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }
}

// Chame a função para validar as credenciais
validaCredenciais();
