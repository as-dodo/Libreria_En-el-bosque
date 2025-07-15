<?php
require_once('../_init.php');

if (!$usuario) {
    header('Location: ../auth/login.php');
    exit;
}

include('../includes/header.php');
?>

<div class="container my-5 text-center">
    <h2 class="mb-4">👋 ¡Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?>!</h2>
    <p class="lead">Gracias por iniciar sesión. Puedes explorar nuestro catálogo o actualizar tu perfil.</p>
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-6 col-lg-4">
            <img src="../img/dog_reading_a_book.jpeg" class="img-fluid rounded" alt="Error image">
        </div>
    </div>
    <a href="../index.php" class="btn btn-success mt-3 btn-fixed">Ir al Catálogo</a>
    <a href="editar_perfil.php" class="btn btn-secondary mt-3 btn-fixed">Editar Perfil</a>

</div>

<?php include('../includes/footer.php'); ?>