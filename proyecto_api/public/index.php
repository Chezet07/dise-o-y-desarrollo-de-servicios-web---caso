<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/proyecto_api/public/home.php':
        require 'home.php';
        break;
    case '/proyecto_api/public/register.php':
        require 'register.php';
        break;
    case '/proyecto_api/public/login.php':
        require 'login.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Página no encontrada"]);
        break;
}
?>