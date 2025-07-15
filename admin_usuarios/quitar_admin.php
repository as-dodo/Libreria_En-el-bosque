<?php
require_once('../_init.php');

if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: ../error.php');
    exit;
}

$id = $_POST['id'] ?? null;

if ($id && is_numeric($id) && $id > 0) {
    if ($usuario['id'] == $id) {
        header('Location: admin_usuarios.php?error=no-self-demote');
        exit;
    }

    $consulta = $conexion->prepare("UPDATE usuarios SET tipo = 'cliente' WHERE id = :id");
    $consulta->execute([':id' => $id]);
}

header('Location: admin_usuarios.php');
exit;
