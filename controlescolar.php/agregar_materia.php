<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Materia</title>
</head>
<body>
    <h2>Agregar Materia</h2>

    <!-- Formulario para agregar materias -->
    <form action="procesar_materia.php" method="post">
        <label for="nombre_materia">Nombre de la Materia:</label>
        <input type="text" id="nombre_materia" name="nombre_materia" required><br>

        <label for="costo_materia">Costo de la Materia:</label>
        <input type="number" step="0.01" id="costo_materia" name="costo_materia" required><br>

        <input type="submit" value="Agregar Materia">
    </form>

    <hr>

    <!-- Visualizar la suma del costo de las materias -->
    
    <?php
    
    $host = 'localhost';
    $dbname = 'controlescolar1';
    $username = 'sa';
    $password = '1q2w3e4r';

    try {
        // Crear la conexión PDO para SQL Server
        $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consultar y mostrar la suma del costo de las materias
        $stmt = $pdo->query("SELECT SUM(Costo) AS suma_costo FROM MATERIAS");
        $suma_costo = $stmt->fetch(PDO::FETCH_ASSOC)['suma_costo'];

        echo "<h3>Suma del Costo de las Materias: $suma_costo</h3>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>
