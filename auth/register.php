<?php

require_once('../_init.php');
include('../includes/header.php');


$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$email = $_POST['email'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;
$confirmar = $_POST['confirmar'] ?? null;
$telefono = $_POST['telefono'] ?? null;
$fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
$genero = $_POST['genero'] ?? null;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = test_input($nombre);
    $apellido = test_input($apellido);
    $email = filter_email($email);
    $genero = test_input($genero);

    if (empty($nombre)) $errores[] = 'Debe ingresar su nombre.';
    if (empty($apellido)) $errores[] = 'Debe ingresar su apellido.';
    if ($email === null) $errores[] = 'Debe ingresar un correo electrónico válido.';

    $clave_validada = filter_password($contrasena);
    if ($clave_validada === null) {
        $errores[] = 'La contraseña debe tener al menos una minúscula, una mayúscula, un número, un símbolo y mínimo 8 caracteres.';
    }

    if ($contrasena !== $confirmar) {
        $errores[] = 'Las contraseñas no coinciden.';
    }

    if (empty($fecha_nacimiento)) {
        $errores[] = 'Debe ingresar su fecha de nacimiento.';
    }

    if (count($errores) === 0) {
        $hash = password_hash($clave_validada, PASSWORD_DEFAULT);

        addUsuario($conexion, [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'contrasena' => $hash,
            'fecha_nacimiento' => $fecha_nacimiento,
            'genero' => $genero,
            'tipo' => 'cliente'
        ]);

        header('Location: registro_exito.php');
        exit;
    }
}
?>
<div class="container my-5">
    <h2 class="mb-4 text-center">Crear una cuenta</h2>

    <ul>
        <?php foreach ($errores as $error): ?>
            <li class="text-danger"><?php echo $error ?></li>
        <?php endforeach ?>
    </ul>

    <form action="register.php" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre">Nombre *</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellido">Apellido *</label>
                <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $apellido ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Correo Electrónico *</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="contrasena">Contraseña *</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena">
            </div>
            <div class="col-md-6 mb-3">
                <label for="confirmar">Confirmar Contraseña *</label>
                <input type="password" class="form-control" name="confirmar" id="confirmar">
            </div>
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento">Fecha de Nacimiento *</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>">
        </div>

        <div class="mb-3">
            <label for="genero">Género</label>
            <select class="form-select" name="genero" id="genero">
                <option value="" disabled selected>Seleccione su género</option>
                <option value="Hombre" <?php if($genero == 'Hombre') echo 'selected'; ?>>Hombre</option>
                <option value="Mujer" <?php if($genero == 'Mujer') echo 'selected'; ?>>Mujer</option>
                <option value="Otro" <?php if($genero == 'Otro') echo 'selected'; ?>>Otro</option>
                <option value="Prefiero no decirlo" <?php if($genero == 'Prefiero no decirlo') echo 'selected'; ?>>Prefiero no decirlo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success w-100">Registrarse</button>
    </form>
</div>


<?php include('../includes/footer.php'); ?>