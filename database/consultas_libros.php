<?php

function getLibros(PDO $conexion): array {
    $consulta = $conexion->query("SELECT * FROM libros");
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}
function eliminarLibro(PDO $conexion, int $id): void {
    $consulta = $conexion->prepare("DELETE FROM libros WHERE id = :id");
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->execute();
}

function agregarLibro(PDO $conexion, array $data): void {
    $sql = "INSERT INTO libros (titulo, autor, precio, descripcion, imagen)
            VALUES (:titulo, :autor, :precio, :descripcion, :imagen)";
    $consulta = $conexion->prepare($sql);
    $consulta->execute($data);
}
function getLibroPorId(PDO $conexion, int $id): ?array {
    $consulta = $conexion->prepare("SELECT * FROM libros WHERE id = :id");
    $consulta->execute([':id' => $id]);
    return $consulta->fetch(PDO::FETCH_ASSOC) ?: null;
}

function actualizarLibro(PDO $conexion, int $id, array $datos): void {
    $consulta = $conexion->prepare("
        UPDATE libros SET
            titulo = :titulo,
            autor = :autor,
            precio = :precio,
            descripcion = :descripcion,
            imagen = :imagen
        WHERE id = :id
    ");
    
    $consulta->execute([
        ':id' => $id,
        ':titulo' => $datos[':titulo'],
        ':autor' => $datos[':autor'],
        ':precio' => $datos[':precio'],
        ':descripcion' => $datos[':descripcion'],
        ':imagen' => $datos[':imagen']
    ]);
}


?>

