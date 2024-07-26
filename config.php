<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
