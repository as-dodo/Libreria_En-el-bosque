<?php 
require_once('./_init.php');
include('includes/header.php'); ?>

<div class="container text-center my-5">
    <h1 class="mb-4 text-success">¡Registro exitoso!</h1>
    <div class="d-flex justify-content-center mb-4">
        <div class="col-md-6">
            <img src="img/dog_reading_a_book.jpeg" class="img-fluid rounded w-100" alt="Dog reading">
        </div>
    </div>
    <p class="lead">Tu cuenta ha sido creada correctamente.</p>
    <p>Ya podés iniciar sesión con tus datos.</p>

    <a href="login.php" class="btn btn-success mt-3">Iniciar Sesión</a>
</div>

<?php include('includes/footer.php'); ?>
