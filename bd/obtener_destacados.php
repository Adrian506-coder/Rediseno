<?php
include("conexion.php");

$sql = "SELECT * FROM menu WHERE destacado = TRUE ORDER BY IdMenu DESC";
$resultado = pg_query($conn, $sql);

$productos = [];

while($fila = pg_fetch_assoc($resultado)){
    $productos[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($productos);
?>
