<?php
require_once('../_init.php');
if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: ../paginas/error.php');
    exit;
}

$libros = getLibros($conexion);
?>

<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <h2>Administración de Libros</h2>

    <a href="agregar_libro.php" class="btn btn-success mb-3">➕ Agregar libro</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10%">Imagen</th>
                <th>Título</th>
                <th>Autor</th>
                <th style="width: 25%">Descripción</th>
                <th style="width: 10%">Precio</th>
                <th style="width: 15%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td style="text-align: center">
                        <?php if (!empty($libro['imagen']) && file_exists(__DIR__ . '/../' . $libro['imagen'])): ?>
                            <img src="../<?php echo htmlspecialchars($libro['imagen']); ?>" alt="Imagen" style="max-height: 100px; border-radius: 4px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($libro['autor']); ?></td>
                    <td><?php echo htmlspecialchars($libro['descripcion']); ?></td>
                    <td>$<?php echo htmlspecialchars($libro['precio']); ?></td>

                    <td>
                        <form method="POST" action="eliminar_libro.php" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> Eliminar</button>
                        </form>
                        <a href="editar_libro.php?id=<?php echo $libro['id']; ?>" class="btn btn-warning btn-sm me-2">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>

                    </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>