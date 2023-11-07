<?php
function conexao(){
    // Configurações do banco de dados
    $servername = " 127.0.0.1"; // Nome do servidor
    $username = " root@localhost"; // Nome de usuário do banco de dados
    $password = " "; // Senha do banco de dados
    $database = "dubium"; // Nome do banco de dados
    
    // Cria uma conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'dubium');

    return $conn;
    
}
?>