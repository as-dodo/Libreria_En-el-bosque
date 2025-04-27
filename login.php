<?php include('includes/header.php'); ?>

<div class="container-fluid">
  <div class="row h-100">
    <div class="col-md-6 d-none d-md-block p-0">
      <img src="/img/bookstore.jpeg" alt="Imagen de fondo" class="img-fluid h-100 w-100" style="object-fit: cover;">
    </div>

    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="w-75">
        <h2 class="mb-4">Iniciar Sesión</h2>

        <form>
          <div class="form-group mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" placeholder="Correo Electrónico" required>
          </div>

          <div class="form-group mb-3">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Contraseña" required>
            <small id="passwordHelpBlock" class="form-text text-muted">
              La contraseña debe tener entre 8 y 20 caracteres, incluir letras y números, y no debe contener espacios, caracteres especiales o emojis.
            </small>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="autoSizingCheck">
            <label class="form-check-label" for="autoSizingCheck">
              Mantener mi sesión iniciada
            </label>
          </div>

          <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>

          <div class="text-center mt-3">
            <a href="#" class="text-decoration-none" style="color: #198754;">¿Olvidaste tu contraseña?</a>
          </div>

          <div class="text-center mt-2">
            <span>¿No tenés cuenta? </span>
            <a href="register.php" class="text-decoration-none" style="color: #198754; font-weight: bold;">Regístrate aquí</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

    <?php include('includes/footer.php'); ?>