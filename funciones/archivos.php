<?php

function subirArchivoImagen(string $campo = 'imagen', string $carpetaDestino = 'img/'): ?string
{
    if (!isset($_FILES[$campo]) || $_FILES[$campo]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $nombreOriginal = basename($_FILES[$campo]['name']);
    $nombreSeguro = uniqid() . '_' . $nombreOriginal;

    $rutaRelativa = $carpetaDestino . $nombreSeguro;

    $rutaFisica = realpath(__DIR__ . '/../' . $carpetaDestino);
    if (!$rutaFisica) {
        return null;
    }

    $rutaCompleta = $rutaFisica . DIRECTORY_SEPARATOR . $nombreSeguro;

    if (move_uploaded_file($_FILES[$campo]['tmp_name'], $rutaCompleta)) {
        return $rutaRelativa;
    }

    return null;
}

