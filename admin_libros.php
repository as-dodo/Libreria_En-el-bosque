<?php
require_once('./_init.php');
if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: error.php');
    exit;
}

$libros = getLibros($conexion);
?>

<?php include('includes/header.php'); ?>

<div class="container my-5">
    <h2>Administración de Libros</h2>

    <a href="agregar_libro.php" class="btn btn-success mb-3">➕ Agregar libro</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($libro['autor']); ?></td>
                        <td>$<?php echo htmlspecialchars($libro['precio']); ?></td>

                        <td>
                            <form method="POST" action="eliminar_libro.php" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> Eliminar</button>
                            </form>
                        </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>