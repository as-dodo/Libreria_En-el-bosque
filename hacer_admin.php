<?php
require_once('./_init.php');

if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: error.php');
    exit;
}

$id = $_POST['id'] ?? null;

if ($id && is_numeric($id) && $id > 0) {
    cambiarRolUsuario($conexion, $id, 'admin');
}

header('Location: admin_usuarios.php');
exit;
