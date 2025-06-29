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

?>

