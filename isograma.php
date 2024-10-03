<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php 
    require 'auxiliar.php';

    $errores = [];

    $cad = comprobar_cadena($errores);

    if (hay_errores($errores)) {
        mostrar_mensajes_error($errores);
    } else {
        $res = comprobar_isograma($cad);
        mostrar_resultado($cad, $res);
    }
    ?>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>
