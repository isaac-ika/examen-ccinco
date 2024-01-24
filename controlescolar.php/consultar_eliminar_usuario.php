<?php

$host = 'localhost';
$dbname = 'controlescolar1';
$username = 'sa';
$password = '1q2w3e4r';

try {
    // Crear la conexión PDO para SQL Server
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar el formulario para consultar y eliminar usuarios
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $consultar_usuario = $_POST['consultar_usuario'];

        // Consultar el usuario en la base de datos
        $stmt = $pdo->prepare("SELECT * FROM ALUMNOS WHERE Usuario = ?");
        $stmt->execute([$consultar_usuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Mostrar los datos del usuario consultado
            echo "Usuario Encontrado:<br>";
            echo "Nombre: " . $usuario['Nombre'] . "<br>";
            echo "Apellido Paterno: " . $usuario['ApellidoPaterno'] . "<br>";
            echo "Apellido Materno: " . $usuario['ApellidoMaterno'] . "<br>";
            echo "Usuario: " . $usuario['Usuario'] . "<br>";

            // Botón para eliminar al usuario
            echo "<form action='eliminar_usuario.php' method='post'>";
            echo "<input type='hidden' name='idAlumno' value='" . $usuario['idAlumno'] . "'>";
            echo "<input type='submit' value='Eliminar Usuario'>";
            echo "</form>";
        } else {
            echo "Usuario no encontrado.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

