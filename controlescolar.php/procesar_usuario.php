<?php

$host = 'localhost';
$dbname = 'controlescolar1';
$username = 'sa';
$password = '1q2w3e4r';

try {
    // Crear la conexión PDO para SQL Server
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar el formulario para agregar usuarios
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];

        // Insertar el nuevo usuario en la base de datos
        $stmt = $pdo->prepare("INSERT INTO ALUMNOS (Nombre, ApellidoPaterno, ApellidoMaterno, Usuario, contrasenia) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $usuario, $contrasenia]);

        echo "Usuario agregado correctamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
