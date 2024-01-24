<?php

$host = 'localhost';
$dbname = 'controlescolar1';
$username = 'sa';
$password = '1q2w3e4r';

try {
    // Crear la conexión PDO para SQL Server
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar el formulario para agregar materias
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_materia = $_POST['nombre_materia'];
        $costo_materia = $_POST['costo_materia'];

        // Insertar la nueva materia en la base de datos
        $stmt = $pdo->prepare("INSERT INTO MATERIAS (Nombre, Costo) VALUES (?, ?)");
        $stmt->execute([$nombre_materia, $costo_materia]);

        echo "Materia agregada correctamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

