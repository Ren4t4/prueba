<?php
require_once "conexion.php";

$nombre = $_POST["nombre"] ?? '';
$materia = $_POST["materia"] ?? '';
$calificacion = $_POST["calificacion"] ?? '';

if ($nombre && $materia && is_numeric($calificacion)) {
    $stmt = $conexion->prepare("INSERT INTO registros (nombre, materia, calificacion) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $materia, $calificacion);
    if ($stmt->execute()) {
        echo "Registro guardado correctamente.<br><a href='index.php'>Volver</a>";
    } else {
        echo "Error al guardar: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Todos los campos son obligatorios.<br><a href='index.php'>Volver</a>";
}

$conexion->close();
?>
