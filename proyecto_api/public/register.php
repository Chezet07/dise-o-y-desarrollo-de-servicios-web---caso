<?php
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        echo "<div class='error'>Por favor, complete todos los campos.</div>";
    } elseif ($password !== $confirm_password) {
        echo "<div class='error'>Las contraseñas no coinciden.</div>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo "<div class='success'>Registro exitoso</div>";
        } else {
            echo "<div class='error'>Error en el registro</div>";
        }
    }
}
?>
