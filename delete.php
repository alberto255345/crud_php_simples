<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro deletado com sucesso";
    } else {
        echo "Erro ao deletar registro: " . $conn->error;
    }
}
?>
