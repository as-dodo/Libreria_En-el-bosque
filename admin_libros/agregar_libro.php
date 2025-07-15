<?php
require_once('../_init.php');
require_once('../funciones/archivos.php');

if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: ../paginas/error.php');
    exit;
}

$nombreArchivo = 'img/default_book_img.jpeg';

$titulo = $_POST['titulo'] ?? null;
$autor = $_POST['autor'] ?? null;
$precio = $_POST['precio'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$imagen = $_POST['imagen'] ?? null;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = test_input($titulo);
    $autor = test_input($autor);
    $descripcion = test_input($descripcion);

    if (empty($titulo)) $errores[] = 'Debe ingresar un título.';
    if (empty($autor)) $errores[] = 'Debe ingresar un autor.';
    if (!is_numeric($precio) || $precio <= 0) {
        $errores[] = 'Debe ingresar un precio válido mayor a 0.';
    }
    if (empty($descripcion)) $errores[] = 'Debe ingresar una descripción.';
    $nuevaImagen = subirArchivoImagen();

    if ($nuevaImagen) {
        $nombreArchivo = $nuevaImagen;
    } elseif (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $errores[] = 'No se pudo subir la imagen.';
    }

    if (count($errores) === 0) {
        agregarLibro($conexion, [
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
    <h2>Agregar nuevo libro</h2>

    <ul>
        <?php foreach ($errores as $error): ?>
            <li class="text-danger"><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="POST" action="agregar_libro.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $titulo ?>">
        </div>
        <div class="mb-3">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="<?php echo $autor ?>">
        </div>
        <div class="mb-3">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio ?>">
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $descripcion ?></textarea>
        </div>
        <div class="mb-3">
            <label for="imagen">Imagen del libro</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar libro</button>
        <a href="admin_libros.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include('../includes/footer.php'); ?>