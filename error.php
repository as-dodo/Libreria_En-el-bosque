<?php include('includes/header.php'); ?>

<div class="container text-center" style="margin-top: 1.5rem;">
    <h1 class="text-danger" style="font-size: 1.5rem; margin-bottom: 1.5rem;">¡Algo salió mal!</h1>

    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-6 col-lg-4">
            <img src="img/cat_reading.jpeg" class="img-fluid rounded" alt="Error image">
        </div>
    </div>

    <p class="lead">No pudimos completar la operación solicitada.</p>
    <p>Es posible que la base de datos no esté disponible o haya ocurrido un error inesperado.</p>

    <a href="index.php" class="btn btn-outline-danger mt-3">Volver al inicio</a>
</div>

<?php include('includes/footer.php'); ?>
