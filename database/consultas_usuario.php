<?php
function addUsuario(PDO $conexion, array $data) {
    $sql = "INSERT INTO usuarios 
        (nombre, apellido, email, contraseña, fecha_nacimiento, genero, tipo)
        VALUES (:nombre, :apellido, :email, :contrasena, :fecha_nacimiento, :genero, :tipo)";

    $consulta = $conexion->prepare($sql);

    $consulta->bindValue(':nombre', $data['nombre']);
    $consulta->bindValue(':apellido', $data['apellido']);
    $consulta->bindValue(':email', $data['email']);
    $consulta->bindValue(':contrasena', $data['contrasena']);
    $consulta->bindValue(':fecha_nacimiento', $data['fecha_nacimiento']);
    $consulta->bindValue(':genero', $data['genero']);
    $consulta->bindValue(':tipo', $data['tipo']);

    $consulta->execute();
}

function getUsuarioLogin(PDO $conexion, $email) {
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $consulta = $conexion->prepare($sql);
    $consulta->bindValue(':email', $email);
    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
}

function getUsuarios(PDO $conexion): array {
    $consulta = $conexion->query("SELECT * FROM usuarios");
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function cambiarRolUsuario(PDO $conexion, int $id, string $rol): void
{
    $consulta = $conexion->prepare("UPDATE usuarios SET tipo = :rol WHERE id = :id");
    $consulta->bindValue(':rol', $rol);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->execute();
}
function obtenerUsuarioPorId(PDO $conexion, int $id): ?array {
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
    $consulta->execute([':id' => $id]);
    return $consulta->fetch(PDO::FETCH_ASSOC) ?: null;
}

?>
