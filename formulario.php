<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Agente Secreto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Ingrese los datos del agente secreto:</h2>
        <form action="procesar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="agente_id">Agente ID:</label>
            <input type="text" id="agente_id" name="agente_id" required>

            <label for="departamento_id">Departamento ID:</label>
            <input type="text" id="departamento_id" name="departamento_id" required>

            <label for="num_misiones">Número de misiones:</label>
            <input type="number" id="num_misiones" name="num_misiones" required>

            <label for="descripcion_mision">Descripción de la nueva misión:</label>
            <textarea id="descripcion_mision" name="descripcion_mision" required></textarea>

            <!-- Token CSRF -->
            <input type="hidden" name="token" value="<?php echo generarToken(); ?>">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
