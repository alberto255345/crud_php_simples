<?php
$username = "root";
$password = "";
$dbname = "crud_db";
$socket = '/cloudsql/test-uece-18:us-central1:mysql-instance';

$dsn = "mysql:unix_socket=$socket;dbname=$dbname";
try {
    $pdo = new PDO($dsn, $username, $password);
    echo "Conectado ao MySQL com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao conectar ao MySQL: " . $e->getMessage();
}

?>
