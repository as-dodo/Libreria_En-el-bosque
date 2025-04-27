<?php include('includes/header.php'); ?>

<h2 class="mb-4">Catálogo de Libros</h2>

<div class="row">
<?php
$libros = [
    [
        "titulo" => "Harry Potter y la piedra filosofal",
        "autor" => "J.K. Rowling",
        "precio" => "10 USD",
        "imagen" => "img/harry1.jpg",
        "descripcion" => "El inicio de una mágica aventura."
    ],
    [
        "titulo" => "Harry Potter y la cámara secreta",
        "autor" => "J.K. Rowling",
        "precio" => "12 USD",
        "imagen" => "img/harry2.jpg",
        "descripcion" => "Misterios oscuros en Hogwarts."
    ],
    [
        "titulo" => "Harry Potter y el prisionero de Azkaban",
        "autor" => "J.K. Rowling",
        "precio" => "14 USD",
        "imagen" => "img/harry3.jpg",
        "descripcion" => "Un fugitivo pone a Hogwarts en peligro."
    ],
];

foreach ($libros as $libro) {
    echo '
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img src="'.$libro['imagen'].'" class="card-img-top" alt="'.$libro['titulo'].'">
            <div class="card-body">
                <h5 class="card-title">'.$libro['titulo'].'</h5>
                <p class="card-text">'.$libro['descripcion'].'</p>
                <p><strong>'.$libro['precio'].'</strong></p>
            </div>
        </div>
    </div>
    ';
}
?>
</div>

<?php include('includes/footer.php'); ?>
