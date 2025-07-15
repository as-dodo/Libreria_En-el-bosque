<?php

require_once('../_init.php');
include('../includes/header.php');



$email = $_POST['email'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;

$email = filter_email($email);
$contrasena = test_input($contrasena);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = getUsuarioLogin($conexion, $email);

    if ($usuario && password_verify($contrasena, $usuario['contraseña'])) {
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nombre' => $usuario['nombre'],
            'apellido' => $usuario['apellido'],
            'email' => $usuario['email'],
            'fecha_nacimiento' => $usuario['fecha_nacimiento'],
            'genero' => $usuario['genero'],
            'tipo' => $usuario['tipo']
        ];

        header('Location: ../user/bienvenida.php');
        exit;
    } else {
        $errores[] = 'Los datos ingresados son incorrectos.';
    }
}
?>

<div class="container-fluid">
  <div class="row h-100">
    <div class="col-md-6 d-none d-md-block p-0">
      <img src="/img/bookstore.jpeg" alt="Imagen de fondo" class="img-fluid h-100 w-100" style="object-fit: cover;">
    </div>

    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="w-75">
        <h2 class="mb-4">Inicia sesión</h2>

        <?php if (!empty($errores)): ?>
          <ul>
            <?php foreach($errores as $error): ?>
              <li class="text-danger"><?php echo $error; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <form action="login.php" method="post">
          <div class="form-group mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email"
                   placeholder="Correo Electrónico" value="<?php echo $email ?>" required>
          </div>

          <div class="form-group mb-3">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena"
                   placeholder="Contraseña" required>
            <small class="form-text text-muted">
              La contraseña debe tener al menos 8 caracteres y ser segura.
            </small>
          </div>
          <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>

          <div class="text-center mt-2">
            <span>¿No tenés cuenta? </span>
            <a href="register.php" class="text-decoration-none fw-bold text-success">Regístrate aquí</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
