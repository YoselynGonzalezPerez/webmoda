<?php
// Establecer la conexión con la base de datos
$servername = "localhost"; // Cambiar según la configuración de tu servidor
$username = "root"; // Cambiar al nombre de usuario de tu base de datos
$password = ""; // Cambiar a la contraseña de tu base de datos
$database = "Contactos"; // Cambiar al nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO mensajes (Nombre, Correo_electronico, Mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>