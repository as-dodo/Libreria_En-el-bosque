<?php
require_once('./_init.php');
if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: error.php');
    exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
    eliminarLibro($conexion, $id);
}

header('Location: admin_libros.php');
exit;
