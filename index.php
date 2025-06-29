<?php

require_once('./_init.php');
include('includes/header.php');

$libros = getLibros($conexion);

?>


<h2 class="mb-4">Catálogo de Libros</h2>

<div class="row">
    <?php foreach ($libros as $libro) { ?>
        <?php $imagen = (isset($libro['imagen']) && file_exists($libro['imagen']))
            ? $libro['imagen']
            : 'img/default_book_img.jpeg';
        ?>

        <div class="col-md-4 mb-4 d-flex">
            <div class="card h-100 w-100 d-flex flex-column">
                <img src="<?php echo htmlspecialchars($imagen); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($libro['titulo']); ?>">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title"><?php echo htmlspecialchars($libro['titulo']); ?></h4>
                    <p class="mb-2"><strong><?php echo htmlspecialchars($libro['autor']); ?></strong></p>
                    <p class="card-text flex-grow-1"><?php echo htmlspecialchars($libro['descripcion']); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0"><strong>$<?php echo htmlspecialchars($libro['precio']); ?></strong></p>
                        <button type="button" class="btn btn-outline-success btn-lg">Comprar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>



<?php include('includes/footer.php'); ?>