<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;

require_once('./database/conexion.php');
require_once('./database/consultas_usuario.php');
require_once('./funciones/validar_input.php');
require_once('./database/consultas_libros.php');