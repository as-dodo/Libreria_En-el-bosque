<?php include('includes/header.php'); ?>

<h2 class="mb-4">Catálogo de Libros</h2>

<div class="row">
    <?php
    $libros = [
        [
            "titulo" => "Harry Potter y la piedra filosofal",
            "autor" => "J.K. Rowling",
            "precio" => "$10 000",
            "imagen" => "img/Harry Potter y la piedra filosofal.jpg",
            "descripcion" => "Un niño huérfano descubre que es un mago 
            y comienza su educación en Hogwarts, donde enfrenta sus 
            primeros desafíos mágicos y un oscuro enemigo."
        ],
        [
            "titulo" => "Harry Potter y la cámara secreta",
            "autor" => "J.K. Rowling",
            "precio" => "$12 000",
            "imagen" => "img/Harry Potter y la camara secreta.jpg",
            "descripcion" => "Harry regresa a Hogwarts y debe descubrir 
            el misterio detrás de unos ataques que petrifican a los estudiantes, 
            mientras una antigua amenaza resurge."
        ],
        [
            "titulo" => "Harry Potter y el prisionero de Azkaban",
            "autor" => "J.K. Rowling",
            "precio" => "$14 000",
            "imagen" => "img/Harry Potter y el prisionero de Azkaban.jpg",
            "descripcion" => "Harry se enfrenta a nuevos peligros 
            cuando un fugitivo escapa de la prisión de Azkaban 
            y secretos de su pasado salen a la luz."
        ],
        [
            "titulo" => "El Hobbit",
            "autor" => "J. R. R. Tolkien",
            "precio" => "$20 000",
            "imagen" => "img/Hobbit.jpg",
            "descripcion" => "La emocionante aventura de Bilbo Bolsón en busca 
            de un tesoro custodiado por un dragón, llena de peligros, 
            amistad y grandes descubrimientos.",
        ],
        [
            "titulo" => "El león, la bruja y el armario",
            "autor" => "C. S. Lewis",
            "precio" => "$17 000",
            "imagen" => "img/El leon, la bruja y el armario.jpg",
            "descripcion" => "Cuatro hermanos descubren un mundo mágico
            llamado Narnia, donde deberán ayudar al león Aslan a derrotar 
            a la Bruja Blanca y devolver la paz al reino."
        ],
        [
            "titulo" => "El príncipe Caspian",
            "autor" => "C. S. Lewis",
            "precio" => "$15 000",
            "imagen" => "img/El príncipe Caspian.jpg",
            "descripcion" => "Los hermanos Pevensie regresan
            a Narnia para ayudar al joven príncipe Caspian a reclamar su trono 
            y liberar el reino de la tiranía."
        ],
    ];

    foreach ($libros as $libro) {
        echo '
        <div class="col-md-4 mb-4 d-flex">
            <div class="card h-100 w-100 d-flex flex-column">
                <img src="' . $libro['imagen'] . '" class="card-img-top" alt="' . $libro['titulo'] . '">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">' . $libro['titulo'] . '</h5>
                    <p class="card-text flex-grow-1">' . $libro['descripcion'] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0"><strong>' . $libro['precio'] . '</strong></p>
                    <button type="button" class="btn btn-outline-success btn-lg">Comprar</button>
                </div>
                </div>
            </div>
        </div>
        ';
    }
    ?>
</div>

<?php include('includes/footer.php'); ?>