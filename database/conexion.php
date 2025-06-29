<?php
try {
    $conexion = new PDO('mysql:host=127.0.0.1;dbname=libreria_en_el_bosque;charset=utf8', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Location: error.php');
    exit;
}
