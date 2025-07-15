<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;

require_once(__DIR__ . '/database/conexion.php');
require_once(__DIR__ . '/database/consultas_usuario.php');
require_once(__DIR__ . '/funciones/validar_input.php');
require_once(__DIR__ . '/database/consultas_libros.php');