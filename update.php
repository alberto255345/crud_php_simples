<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Registro não encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Usuário</title>
</head>
<body>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nome: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
