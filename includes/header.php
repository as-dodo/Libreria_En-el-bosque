<?php

$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En el bosque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>

<body>

    <header style="background-color: transparent;">
        <div class="container d-flex align-items-center justify-content-between py-2">
            <div class="d-flex align-items-center">
                <img src="/img/logo.png" alt="En el bosque" style="height: 200px; width: auto;">
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav me-4">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">Sobre Nosotros</a>
                            </li>
                        </ul>

                        <?php if ($usuario): ?>
                            <?php if ($usuario['tipo'] === 'admin'): ?>
                                <div class="nav-item">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Administrar
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                            <li><a class="dropdown-item" href="admin_libros.php">Libros</a></li>
                                            <li><a class="dropdown-item" href="admin_usuarios.php">Usuarios</a></li>
                                        </ul>
                                    </li>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex align-items-center ms-4">
                                <span class="me-3 text-success fw-semibold">
                                    <a class="me-3 text-success fw-semibold" href="editar_perfil.php" style="color: #198754; font-weight: bold;">
                                        📖 Hola, <?php echo htmlspecialchars($usuario['nombre']); ?>
                                    </a>

                                    <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold" style="font-size: 1.2rem;">Cerrar sesión</a>
                            </div>
                        <?php else: ?>
                            <div class="d-flex">
                                <a href="login.php" class="btn btn-outline-success me-2 rounded-pill px-3 fw-semibold" style="font-size: 1.2rem;">Iniciar Sesión</a>
                                <a href="register.php" class="btn btn-success rounded-pill px-3 fw-semibold" style="font-size: 1.2rem;">Registrarse</a>


                            </div>
                        <?php endif; ?>
                        </ul>

                    </div>
                </div>
            </nav>

        </div>
    </header>

    <main class="container mt-4">