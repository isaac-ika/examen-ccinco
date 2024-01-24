<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
</head>
<body>
    <h2>Agregar Usuario</h2>
    
    <!-- Formulario para agregar usuarios -->
    <form action="procesar_usuario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required><br>

        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" id="apellido_materno" name="apellido_materno"><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia" required><br>

        <input type="submit" value="Agregar Usuario">
    </form>

    <hr>

    <!-- Formulario para consultar y eliminar usuarios -->
    <h2>Consultar y Eliminar Usuario</h2>
    <form action="consultar_eliminar_usuario.php" method="post">
        <label for="consultar_usuario">Usuario a Consultar/Eliminar:</label>
        <input type="text" id="consultar_usuario" name="consultar_usuario" required><br>

        <input type="submit" name="consultar" value="Consultar">
        <input type="submit" name="eliminar" value="Eliminar">
    </form>
</body>
</html>
