<?php
session_start();

// Función para generar un token CSRF
function generarToken() {
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    return $token;
}

// Verificar el token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['csrf_token']) {
    // Validar y obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $agente_id = htmlspecialchars($_POST['agente_id']);
    $departamento_id = htmlspecialchars($_POST['departamento_id']);
    $num_misiones = intval($_POST['num_misiones']);
    $descripcion_mision = htmlspecialchars($_POST['descripcion_mision']);

    // Aquí puedes realizar cualquier validación adicional de los datos recibidos

    // Cifrar los campos necesarios (por ejemplo, el agente ID)
    $agente_id_cifrado = password_hash($agente_id, PASSWORD_DEFAULT);

    // Aquí podrías almacenar los datos en una base de datos o realizar cualquier otra acción necesaria

    // Redirigir o mostrar un mensaje de éxito
    echo "<h2>Datos del agente secreto ingresados con éxito:</h2>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Agente ID cifrado: $agente_id_cifrado</p>";
    echo "<p>Departamento ID: $departamento_id</p>";
    echo "<p>Número de misiones: $num_misiones</p>";
    echo "<p>Descripción de la nueva misión: $descripcion_mision</p>";
} else {
    // Si el token CSRF no coincide, mostrar un mensaje de error o redirigir
    echo "<h2>Error de seguridad: Token CSRF no válido.</h2>";
}
?>
