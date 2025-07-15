<?php
require_once('../_init.php');

if (!$usuario) {
    header('Location: ../auth/login.php');
    exit;
}

$nombre = $usuario['nombre'];
$apellido = $usuario['apellido'];
$email = $usuario['email'];
$fecha_nacimiento = $usuario['fecha_nacimiento'];
$genero = $usuario['genero'];

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = test_input($_POST['nombre'] ?? '');
    $apellido = test_input($_POST['apellido'] ?? '');
    $email = test_input($_POST['email'] ?? '');
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $genero = $_POST['genero'] ?? '';

    if (empty($nombre)) $errores[] = 'El nombre es obligatorio.';
    if (empty($apellido)) $errores[] = 'El apellido es obligatorio.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'Email inválido.';
    if (empty($fecha_nacimiento)) $errores[] = 'La fecha de nacimiento es obligatoria.';
    if (!in_array($genero, ['Mujer', 'Hombre'])) $errores[] = 'Género inválido.';
    $nueva_contrasena = $_POST['nueva_contrasena'] ?? '';
    $confirmar_contrasena = $_POST['confirmar_contrasena'] ?? '';

    if (!empty($nueva_contrasena) || !empty($confirmar_contrasena)) {
        if (strlen($nueva_contrasena) < 6) {
            $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
        }
        if ($nueva_contrasena !== $confirmar_contrasena) {
            $errores[] = 'Las contraseñas no coinciden.';
        }
    }

    if (count($errores) === 0) {
        if (!empty($nueva_contrasena)) {
            $hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

            $consulta = $conexion->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, fecha_nacimiento = :fecha_nacimiento, genero = :genero, contraseña = :contrasena WHERE id = :id");

            $consulta->execute([
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':email' => $email,
                ':fecha_nacimiento' => $fecha_nacimiento,
                ':genero' => $genero,
                ':contrasena' => $hash,
                ':id' => $usuario['id']
            ]);
        } else {
            $consulta = $conexion->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, fecha_nacimiento = :fecha_nacimiento, genero = :genero WHERE id = :id");

            $consulta->execute([
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':email' => $email,
                ':fecha_nacimiento' => $fecha_nacimiento,
                ':genero' => $genero,
                ':id' => $usuario['id']
            ]);
        }

        $_SESSION['usuario'] = obtenerUsuarioPorId($conexion, $usuario['id']);

        header('Location: ../index.php?perfil_actualizado=1');
        exit;
    }
}
?>

<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <h2>Editar perfil</h2>

    <ul>
        <?php foreach ($errores as $error): ?>
            <li class="text-danger"><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="POST">
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($nombre); ?>">
        </div>
        <div class="mb-3">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo htmlspecialchars($apellido); ?>">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="<?php echo htmlspecialchars($fecha_nacimiento); ?>">
        </div>
        <div class="mb-3">
            <label for="genero">Género</label>
            <select name="genero" id="genero" class="form-control">
                <option value="Mujer" <?php echo $genero === 'Mujer' ? 'selected' : ''; ?>>Mujer</option>
                <option value="Hombre" <?php echo $genero === 'Hombre' ? 'selected' : ''; ?>>Hombre</option>
            </select>
        </div>
        <hr>
        <h5>Cambiar contraseña</h5>

        <div class="mb-3">
            <label for="nueva_contrasena">Nueva contraseña</label>
            <input type="password" name="nueva_contrasena" id="nueva_contrasena" class="form-control">
        </div>
        <div class="mb-3">
            <label for="confirmar_contrasena">Confirmar nueva contraseña</label>
            <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include('../includes/footer.php'); ?>