<?php
require_once('../_init.php');
require_once('../funciones/archivos.php');


if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: ../paginas/error.php');
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header('Location: admin_libros.php');
    exit;
}

$libro = getLibroPorId($conexion, $id);
if (!$libro) {
    header('Location: admin_libros.php');
    exit;
}

$nombreArchivo = $libro['imagen'];

$titulo = $libro['titulo'];
$autor = $libro['autor'];
$precio = $libro['precio'];
$descripcion = $libro['descripcion'];
$imagen = $libro['imagen'];

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = test_input($_POST['titulo'] ?? '');
    $autor = test_input($_POST['autor'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $descripcion = test_input($_POST['descripcion'] ?? '');

    if (empty($titulo)) $errores[] = 'Debe ingresar un título.';
    if (empty($autor)) $errores[] = 'Debe ingresar un autor.';
    if (!is_numeric($precio) || $precio <= 0) $errores[] = 'Debe ingresar un precio válido.';
    if (empty($descripcion)) $errores[] = 'Debe ingresar una descripción.';
    $nuevaImagen = subirArchivoImagen();

    if ($nuevaImagen) {
        $nombreArchivo = $nuevaImagen;
    } elseif (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $errores[] = 'No se pudo subir la imagen.';
    }
    if (count($errores) === 0) {
        actualizarLibro($conexion, $id, [
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':precio' => $precio,
            ':descripcion' => $descripcion,
            ':imagen' => $nombreArchivo
        ]);
        header('Location: admin_libros.php');
        exit;
    }
}
?>

<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <h2>Editar Libro</h2>

    <ul>
        <?php foreach ($errores as $error): ?>
            <li class="text-danger"><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo htmlspecialchars($titulo); ?>">
        </div>
        <div class="mb-3">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="<?php echo htmlspecialchars($autor); ?>">
        </div>
        <div class="mb-3">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="<?php echo htmlspecialchars($precio); ?>">
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"><?php echo htmlspecialchars($descripcion); ?></textarea>
        </div>
        <?php if (!empty($libro['imagen']) && file_exists(__DIR__ . '/../' . $libro['imagen'])): ?>
            <div class="mb-3">
                <label>Imagen actual:</label><br>
                <img src="../<?php echo htmlspecialchars($libro['imagen']); ?>" alt="Imagen actual" style="max-height: 150px; border-radius: 8px;">
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="imagen">Imagen (opcional)</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="admin_libros.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include('../includes/footer.php'); ?>