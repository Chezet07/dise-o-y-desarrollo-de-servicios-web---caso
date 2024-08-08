<?php
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<div class='error'>Por favor, complete todos los campos.</div>";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo "<div class='success'>Inicio de sesión exitoso</div>";
            header("Location: menu.php");
            exit();
        } else {
            echo "<div class='error'>Usuario o contraseña incorrectos</div>";
        }
    }
}
?>
