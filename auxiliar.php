<?php

function agregar_error($par, $mensaje, &$errores) {
    if (!isset($errores[$par])) {
        $errores[$par] = [];
    }
    $errores[$par][] = $mensaje;
}

function obtener_parametro($par, $mensaje, &$errores)
{
    if (!isset($_GET[$par])) {
        agregar_error($par, $mensaje, $errores);
        return null;
    }
    return str_replace(' ', '', $_GET[$par]);
}

function comprobar_no_vacio($cadena, $par, $mensaje, &$errores)
{
    if ($cadena =='') {
        agregar_error($par, $mensaje, $errores);
    }
}

function hay_errores($errores)
{
    return !empty($errores);
}

function no_hay_errores($errores, $par)
{
    return !isset($errores[$par]) || empty($errores[$par]);
}

function comprobar_cadena(&$errores)
{
    $cad = obtener_parametro('cad', 'Falta la cadena', $errores);
    if (no_hay_errores($errores, 'cad')) {
        comprobar_no_vacio($cad, 'cad', 'La cadena es obligatoria', $errores);
    }

    return $cad;

}

function mostrar_mensajes_error($errores)
{
    foreach ($errores as $mensajes) {
        foreach ($mensajes as $mensaje) { ?>
            <h3><?= $mensaje ?></h3><?php
        }
    }
}

function comprobar_isograma($cad)
{
    $cad = strtolower($cad);
    foreach (str_split($cad) as $caracter) {
        if ((mb_substr_count($cad, $caracter)) > 1) {
            return 'NO';
        }
    }
    return 'SI';
}

function mostrar_resultado($cad, $res)
{ ?>
    <p>La cadena "<?= $cad ?>" <b><?= $res ?></b> es un isograma.</p><?php
}
