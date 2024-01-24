<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'controlescolar1';
$username = 'sa';
$password = '1q2w3e4r';


try {
    // Crear la conexión PDO para SQL Server
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);

    // Configuración adicional de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Aquí continúa el resto del código para la validación del usuario y contraseña...
} catch (PDOException $e) {
    // Manejo de errores de conexión
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

// Validación de usuario y contraseña (usando PDO para la conexión, ajusta según tu entorno)
try {
    $stmt = $pdo->prepare("SELECT * FROM ALUMNOS WHERE Usuario = ? AND contrasenia = ?");
    $stmt->execute([$usuario, $contrasenia]);

    if ($stmt->rowCount() > 0) {
        // Usuario autenticado, redirigir a la página del menú
        header("Location: menu.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
