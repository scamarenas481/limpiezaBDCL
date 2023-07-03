<?php
// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashear la contraseña

// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$conn = new mysqli('localhost', 'root', '', 'casalupita');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear la consulta SQL
$query = "INSERT INTO usuarios (Usuario, Password, hashedPassword) VALUES (?, ?, ?)";

// Preparar la declaración
$statement = $conn->prepare($query);

// Vincular los parámetros
$statement->bind_param("sss", $username, $password, $hashedPassword);

// Ejecutar la consulta
if ($statement->execute()) {
    echo "Usuario creado exitosamente.";
} else {
    echo "Error al crear el usuario: " . $conn->error;
}

// Cerrar la declaración y la conexión
$statement->close();
$conn->close();
?>
