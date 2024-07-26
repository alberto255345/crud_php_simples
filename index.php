<?php
include 'config.php';

$sql = "SELECT id, name, email, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["email"]. "</td>
                        <td>" . $row["created_at"]. "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Editar</a> |
                            <a href='delete.php?id=" . $row["id"] . "'>Deletar</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum usuário encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
