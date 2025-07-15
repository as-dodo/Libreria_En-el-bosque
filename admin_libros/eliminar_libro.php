<?php
require_once('../_init.php');
if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: ../paginas/error.php');
    exit;
}

$id = $_POST['id'] ?? null;

if ($id && is_numeric($id) && $id > 0) {
    eliminarLibro($conexion, (int)$id);
}

header('Location: admin_libros.php');
exit;
