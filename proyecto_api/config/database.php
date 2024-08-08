<?php
// Configuración de la base de datos
$host = 'localhost';
$db = 'Registros';
$user = 'usuario';
$pass = 'contraseña';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
