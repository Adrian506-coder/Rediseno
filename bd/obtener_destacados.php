<?php
include("conexion.php");

$sql = "SELECT * FROM menu WHERE destacado = 1 ORDER BY idMenu DESC";
$resultado = $conexion->query($sql);

$productos = [];

while($fila = $resultado->fetch_assoc()){
    $productos[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($productos);
?>