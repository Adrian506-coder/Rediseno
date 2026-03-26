<?php
$conn = pg_connect("
    host=aws-0-us-west-2.pooler.supabase.com
    port=6543
    dbname=postgres
    user=postgres.djzggqztxhphmypsalra
    password=Adrian506-coder
");

if (!$conn) {
    die("Error de conexión ❌");
} else {
    echo "Conectado a Supabase 🚀";
}
// $host = "localhost";
// $usuario = "root";
// $password = "";
// $bd = "cantina_chichilo";

// $conexion = new mysqli($host, $usuario, $password, $bd);

// if ($conexion->connect_error) {
//     die("Error de conexión: " . $conexion->connect_error);
// }
?>
