 <?php
require_once 'conexion.php'; // Incluye conexión segura a Azure

$sql = "SELECT nombre, materia, calificacion FROM registros";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Calificaciones</title>
</head>
<body>
    <h1>Registrar Calificación de Estudiante</h1>

    <form method="post" action="guardar.php">
        <label>Nombre del Estudiante:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Materia:</label><br>
        <input type="text" name="materia" required><br><br>

        <label>Calificación (0 a 100):</label><br>
        <input type="number" name="calificacion" min="0" max="100" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <h2>Registros Guardados:</h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>Nombre</th>
                <th>Materia</th>
                <th>Calificación</th>
            </tr>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['materia']) ?></td>
                    <td><?= htmlspecialchars($row['calificacion']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No hay registros aún.</p>
    <?php endif; ?>

</body>
</html>
