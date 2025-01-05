<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentaluna</title>
    <meta name="description" content="Atención dental en Cuernavaca, Morelos. Especialista en salud bucal. Brindando cuidado personalizado para sonrisas saludables. ¡Agenda tu cita hoy!">
    <link rel="icon" type="image/web" href="/build/img/13.webp">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <div class="contenedor-app">
        <div class="imagen"></div>

        <div class="app">
        <?php echo $contenido; ?>
        </div>

    </div>

    <?php
        echo $script ?? '';
    ?>

</body>
</html>